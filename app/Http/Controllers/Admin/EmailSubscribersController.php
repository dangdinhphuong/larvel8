<?php

namespace App\Http\Controllers\Admin;

use App\Criteria\AdminSearchCriteriaCriteria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\EmailSubscriberCreateRequest;
use App\Http\Requests\EmailSubscriberUpdateRequest;
use App\Repositories\Interfaces\EmailSubscriberRepository;
use App\Validators\EmailSubscriberValidator;

/**
 * Class EmailSubscribersController.
 *
 * @package namespace App\Http\Controllers\Admin;
 */
class EmailSubscribersController extends Controller
{
    /**
     * @var EmailSubscriberRepository
     */
    protected $repository;

    /**
     * EmailSubscribersController constructor.
     *
     * @param EmailSubscriberRepository $repository
     */
    public function __construct(EmailSubscriberRepository $repository)
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
        $emailSubscribers = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $emailSubscribers,
            ]);
        }

        return view('admin.emailSubscribers.index', compact('emailSubscribers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmailSubscriberCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(EmailSubscriberCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $emailSubscriber = $this->repository->create($request->all());

            $response = [
                'message' => __("admin.action.created"),
                'data'    => $emailSubscriber->toArray(),
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
        $emailSubscriber = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $emailSubscriber,
            ]);
        }

        return view('emailSubscribers.show', compact('emailSubscriber'));
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
        $emailSubscriber = $this->repository->find($id);

        return view('emailSubscribers.edit', compact('emailSubscriber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EmailSubscriberUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(EmailSubscriberUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $emailSubscriber = $this->repository->update($request->all(), $id);

            $response = [
                'message' => __("admin.action.updated"),
                'data'    => $emailSubscriber->toArray(),
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
