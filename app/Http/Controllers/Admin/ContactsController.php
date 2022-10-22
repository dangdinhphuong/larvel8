<?php

namespace App\Http\Controllers\Admin;

use App\Criteria\AdminSearchCriteriaCriteria;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ContactCreateRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Repositories\Interfaces\ContactRepository;

/**
 * Class ContactsController.
 *
 * @package namespace App\Http\Controllers\Admin;
 */
class ContactsController extends Controller
{
    /**
     * @var ContactRepository
     */
    protected $repository;


    /**
     * ContactsController constructor.
     *
     * @param ContactRepository $repository
     */
    public function __construct(ContactRepository $repository)
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
        $contacts = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $contacts,
            ]);
        }

        return view('admin.contact.index', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContactCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ContactCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $contact = $this->repository->create($request->all());

            $response = [
                'message' => __("admin.action.created"),
                'data'    => $contact->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $contact,
            ]);
        }

        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = $this->repository->find($id);

        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ContactUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ContactUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $contact = $this->repository->update($request->all(), $id);

            $response = [
                'message' => __("admin.action.updated"),
                'data'    => $contact->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
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
