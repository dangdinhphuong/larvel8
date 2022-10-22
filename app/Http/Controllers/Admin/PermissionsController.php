<?php

namespace App\Http\Controllers\Admin;

use App\Criteria\AdminSearchCriteriaCriteria;
use App\Helpers\PermissionsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionCreateRequest;
use App\Http\Requests\PermissionUpdateRequest;
use App\Repositories\Interfaces\PermissionRepository;

/**
 * Class PermissionsController.
 *
 * @package namespace App\Http\Controllers\Admin;
 */
class PermissionsController extends Controller
{
    /**
     * @var PermissionRepository
     */
    protected $repository;

    /**
     * PermissionsController constructor.
     *
     * @param PermissionRepository $repository
     */
    public function __construct(PermissionRepository $repository)
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
        $permissions = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $permissions,
            ]);
        }
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {

        $routers = PermissionsHelper::getAllRoutes();
        return view('admin.permissions.form', compact('routers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PermissionCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PermissionCreateRequest $request)
    {

        $permission = $this->repository->create($request->validated());

        $response = [
            'message' => __("admin.action.created"),
            'data' => $permission->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->route('permission.index')->with('message', $response['message']);

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
        $permission = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $permission,
            ]);
        }

        return view('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $item = $this->repository->find($id);
        $routers = PermissionsHelper::getAllRoutes();

        return view('admin.permissions.form', compact('item', 'id', 'routers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PermissionUpdateRequest $request
     * @param string $id
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PermissionUpdateRequest $request, $id)
    {

        $permission = $this->repository->update($request->all(), $id);

        $response = [
            'message' => __("admin.action.updated"),
            'data' => $permission->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->route('permission.index')->with('message', $response['message']);

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

        if (request()->wantsJson()) {

            return response()->json([
                'message' => __("admin.action.deleted"),
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', __("admin.action.deleted"));
    }
}
