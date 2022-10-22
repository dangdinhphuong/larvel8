<?php

namespace App\Http\Controllers\Admin;

use App\Criteria\AdminSearchCriteriaCriteria;
use App\Entities\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Interfaces\CategoryRepository;

/**
 * Class CategoriesController.
 *
 * @package namespace App\Http\Controllers\Admin;
 */
class CategoriesController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $repository;


    /**
     * CategoriesController constructor.
     *
     * @param CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(AdminSearchCriteriaCriteria::class);
        $categories = $this->repository->skipPresenter()->paginate();

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $categories,
            ]);
        }
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $locale = $request->get('locale', app()->getLocale());
        $attr = $request->only($this->repository->getModel()->getFillable());
        $attr[$locale] = $request->validated();
        $category = $this->repository->create($attr);

        $response = [
            'message' => __("admin.action.created"),
            'data' => $category,
        ];

        if ($request->wantsJson()) {
            return response()->json($response);
        }

        return redirect()->route('category.index')->with('message', $response['message']);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $category = $this->repository->find($id);

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $category,
            ]);
        }

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $current_locale = request()->get('locale', app()->getLocale());
        app()->setLocale($current_locale);
        $item = $this->repository->skipPresenter()->find($id);

        return view('admin.categories.form', compact('item', 'current_locale', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param string $id
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        $locale = $request->get('locale', app()->getLocale());
        $attr = $request->only($this->repository->getModel()->getFillable());
        $attr[$locale] = $request->validated();
        $category = $this->repository->update($attr, $id);

        $response = [
            'message' => __("admin.action.updated"),
            'data' => $category,
        ];

        if ($request->wantsJson()) {
            return response()->json($response);
        }

        return redirect()->route('category.index')->with('message', $response['message']);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        $this->repository->getModel()
            ->newModelQuery()
            ->where('parent_id', $id)
            ->update(['parent_id' => null]);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => __("admin.action.deleted"),
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', __("admin.action.deleted"));
    }

    public function fetchDataFancyTree()
    {
        $type = request()->has('type') ? request()->get('type') : Category::TYPE_FAQ;
        $categories = $this->repository
            ->findWhere(
                ['type' => $type]
            );
        if (request()->has('exclude') && !is_null(request()->get('exclude'))){
            $categories = $categories->except(request()->get('exclude'));
        }
        $parent_categories = $categories->where('parent_id', null);
        $formatted_categories = [];
        foreach ($parent_categories as $category) {
            $formatted_categories [] = [
                'title' => $category->name ?? "Chưa có bản dịch",
                'slug' => $category->slug ?? "Chưa có bản dịch",
                'key' => $category->id,
                'children' => $this->getChildCategories($categories, $category->id)
            ];
        }
        return response()->json($formatted_categories);
    }

    public function getChildCategories($categories, $parent_id)
    {
        $child_categories =  $categories->where('parent_id', $parent_id);
        $formatted_categories = [];

        foreach ($child_categories as $category){
            $formatted_categories [] = [
                'title' => $category->name ?? "Chưa có bản dịch",
                'slug' => $category->slug ?? "Chưa có bản dịch",
                'key' => $category->id,
                'children' => $this->getChildCategories($categories, $category->id)
            ];
        }

        return $formatted_categories;
    }
}
