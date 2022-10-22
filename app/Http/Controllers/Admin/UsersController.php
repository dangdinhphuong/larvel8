<?php

namespace App\Http\Controllers\Admin;

use App\Criteria\AdminSearchCriteriaCriteria;
use App\Events\UpdateUserDataProcess;
use App\Repositories\Interfaces\RoleRepository;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\Interfaces\UserRepository;
use App\Http\Controllers\Controller;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers\Admin;
 */
class UsersController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var RoleRepository
     */
    protected $roleRepository;


    /**
     * UsersController constructor.
     *
     * @param UserRepository $repository
     * @param RoleRepository $roleRepository
     */
    public function __construct(
        UserRepository $repository,
        RoleRepository $roleRepository
    )
    {
        $this->repository = $repository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(AdminSearchCriteriaCriteria::class);
        $users = $this->repository->all();

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $users,
            ]);
        }

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->roleRepository->all();
        return view('admin.users.form', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UserCreateRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt(\Str::random());

        $user = $this->repository->create($data);

        $response = [
            'message' => __("admin.action.created"),
            'data' => $user->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->route('user.index')->with('message', $response['message']);

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
        $user = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $user,
            ]);
        }

        return view('users.show', compact('user'));
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
        $roles = $this->roleRepository->all();
        return view('admin.users.form', compact('item', 'roles', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = $this->repository->update($request->validated(), $id);
        event(new UpdateUserDataProcess($id));
        $response = [
            'message' => __("admin.action.updated"),
            'data' => $user->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->route('user.index')->with('message', $response['message']);

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
        event(new UpdateUserDataProcess($id));

        if (request()->wantsJson()) {

            return response()->json([
                'message' => __("admin.action.deleted"),
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', __("admin.action.deleted"));
    }
}
