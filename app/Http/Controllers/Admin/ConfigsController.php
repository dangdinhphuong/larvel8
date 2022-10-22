<?php

namespace App\Http\Controllers\Admin;

use App\Criteria\AdminSearchCriteriaCriteria;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigRequest;
use App\Repositories\Interfaces\ConfigRepository;
use Cache;

/**
 * Class ConfigsController.
 *
 * @package namespace App\Http\Controllers\Admin;
 */
class ConfigsController extends Controller
{
    /**
     * @var ConfigRepository
     */
    protected $repository;


    /**
     * ConfigsController constructor.
     *
     * @param ConfigRepository $repository
     */
    public function __construct(ConfigRepository $repository)
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
        $configs = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $configs,
            ]);
        }

        return view('admin.configs.index', compact('configs'));
    }

    public function create()
    {
        return view('admin.configs.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ConfigRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ConfigRequest $request)
    {
        $locale = $request->get('locale', app()->getLocale());
        $attr = $request->only($this->repository->getModel()->getFillable());
        $attr[$locale] = $request->validated();
        $attr[$locale]['value'] = $request->get('value-' . $request->get('type'));
        $config = $this->repository->create($attr);

        $response = [
            'message' => __("admin.action.created"),
            'data' => $config->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        $this->clearCache(false);
        return redirect()->route('config.index')->with('message', $response['message']);

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
        $config = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $config,
            ]);
        }

        return view('configs.show', compact('config'));
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

        return view('admin.configs.form', compact('item', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ConfigRequest $request
     * @param string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ConfigRequest $request, $id)
    {
        $locale = $request->get('locale', app()->getLocale());
        $attr = $request->only($this->repository->getModel()->getFillable());
        $attr[$locale] = $request->validated();
        $attr[$locale]['value'] = $request->get('value-' . $request->get('type'));

        $config = $this->repository->update($attr, $id);

        $response = [
            'message' => __("admin.action.updated"),
            'data' => $config->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }
        $this->clearCache(false);
        return redirect()->route('config.index')->with('message', $response['message']);

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

    public function clearCache($redirect = true)
    {
        foreach (config('locale') as $key => $value) {
            Cache::delete('config.' . $key);
        }
        if ($redirect) return redirect()->back()->with('message', 'Đã xóa cache cấu hình');

        return true;
    }
}
