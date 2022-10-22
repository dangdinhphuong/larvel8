<?php

namespace App\Http\Controllers\Admin;

use App\Criteria\AdminSearchCriteriaCriteria;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Repositories\Interfaces\SliderRepository;

/**
 * Class SlidersController.
 *
 * @package namespace App\Http\Controllers\Admin;
 */
class SlidersController extends Controller
{
    /**
     * @var SliderRepository
     */
    protected $repository;


    /**
     * SlidersController constructor.
     *
     * @param SliderRepository $repository
     */
    public function __construct(SliderRepository $repository)
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
        $sliders = $this->repository->all();

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $sliders,
            ]);
        }

        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SliderRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(SliderRequest $request)
    {

        $locale = $request->get('locale', app()->getLocale());
        $attr = $request->only($this->repository->getModel()->getFillable());
        $attr[$locale] = $request->validated();

        $slider = $this->repository->create($attr);

        $response = [
            'message' => __("admin.action.created"),
            'data' => $slider->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->route('slider.index')->with('message', $response['message']);

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
        $slider = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $slider,
            ]);
        }

        return view('sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->repository->find($id);

        return view('admin.sliders.form', compact('item', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SliderRequest $request
     * @param string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(SliderRequest $request, $id)
    {

        $locale = $request->get('locale', app()->getLocale());
        $attr = $request->only($this->repository->getModel()->getFillable());
        $attr[$locale] = $request->validated();

        $slider = $this->repository->update($attr, $id);

        $response = [
            'message' => __("admin.action.updated"),
            'data' => $slider->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->route('slider.index')->with('message', $response['message']);

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
