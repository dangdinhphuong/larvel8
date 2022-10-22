<?php

namespace App\Http\Controllers\Admin;

use App\Criteria\AdminSearchCriteriaCriteria;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Repositories\Interfaces\PermissionRepository;
use App\Repositories\Interfaces\RoleRepository;

/**
 * Class RolesController.
 *
 * @package namespace App\Http\Controllers\Admin;
 */
class RolesController extends Controller
{
    /**
     * @var RoleRepository
     */
    protected $repository;
    protected $permissionRepository;


    /**
     * RolesController constructor.
     *
     * @param RoleRepository $repository
     */
    public function __construct(
        RoleRepository       $repository,
        PermissionRepository $permissionRepository
    )
    {
        $this->repository = $repository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(AdminSearchCriteriaCriteria::class);
        $roles = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $roles,
            ]);
        }

        return view('admin.roles.index', compact('roles'));
    }

    function create()
    {
        $permissions = $this->permissionRepository->all();
        $formattedRoles = [];
        foreach ($permissions as $permission) {
            if (!isset($formattedRoles[$permission->group])) {
                $formattedRoles[$permission->group] = [];
            }
            $formattedRoles[$permission->group][] = $permission;
        }
        return view('admin.roles.form', compact('formattedRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(RoleCreateRequest $request)
    {
        $role = $this->repository->create($request->validated());

        $response = [
            'message' => __("admin.action.created"),
            'data' => $role->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->route('role.index')->with('message', $response['message']);

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
        $role = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $role,
            ]);
        }

        return view('roles.show', compact('role'));
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
        $permissions = $this->permissionRepository->all();
        $formattedRoles = [];
        foreach ($permissions as $permission) {
            if (!isset($formattedRoles[$permission->group])) {
                $formattedRoles[$permission->group] = [];
            }
            $formattedRoles[$permission->group][] = $permission;
        }
        return view('admin.roles.form', compact('item', 'id', 'formattedRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoleUpdateRequest $request
     * @param string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(RoleUpdateRequest $request, $id)
    {

        $role = $this->repository->update($request->validated(), $id);

        $response = [
            'message' => __("admin.action.updated"),
            'data' => $role->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->route('role.index')->with('message', $response['message']);

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
