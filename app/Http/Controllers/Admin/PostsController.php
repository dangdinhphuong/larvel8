<?php

namespace App\Http\Controllers\Admin;

use App\Criteria\AdminSearchCriteriaCriteria;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Repositories\Interfaces\CategoryRepository;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Repositories\Interfaces\PostRepository;

/**
 * Class PostsController.
 *
 * @package namespace App\Http\Controllers\Admin;
 */
class PostsController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $repository;

    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;


    /**
     * PostsController constructor.
     *
     * @param PostRepository $repository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(
        PostRepository     $repository,
        CategoryRepository $categoryRepository
    )
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(AdminSearchCriteriaCriteria::class);
        $posts = $this->repository->skipPresenter()->all();

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $posts,
            ]);
        }

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $current_locale = request()->get('locale', app()->getLocale());
        app()->setLocale($current_locale);
        $categories = $this->categoryRepository
            ->skipPresenter()
            ->get();
        return view('admin.posts.form', compact('categories', 'current_locale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $locale = $request->get('locale', app()->getLocale());
        $attr = $request->only($this->repository->getModel()->getFillable());
        $attr[$locale] = $request->validated();
        $attr['author'] = \Auth::id();

        $post = $this->repository->create($attr);
        $response = [
            'message' => __("admin.action.created"),
            'data' => $post->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->route('post.index')->with('message', $response['message']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $post,
            ]);
        }

        return view('posts.show', compact('post'));
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
        $categories = $this->categoryRepository
            ->skipPresenter()
            ->get();
        $item = $this->repository->skipPresenter()->find($id);

        return view('admin.posts.form', compact('item', 'current_locale', 'categories', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PostRequest $request, $id)
    {
        $locale = $request->get('locale', app()->getLocale());
        $attr = $request->only($this->repository->getModel()->fillable);
        $attr[$locale] = $request->validated();

        $post = $this->repository->update($attr, $id);

        $response = [
            'message' => __("admin.action.updated"),
            'data' => $post->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->route('post.index')->with('message', $response['message']);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => __("admin.action.deleted"),
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', __("admin.action.deleted"));
    }
}
