<?php

namespace App\Http\Controllers\Admin;

use App\Criteria\AdminSearchCriteriaCriteria;
use App\Criteria\WithTranslateCriteria;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ContactInfoCreateRequest;
use App\Http\Requests\ContactInfoUpdateRequest;
use App\Repositories\Interfaces\ContactInfoRepository;

/**
 * Class ContactInfosController.
 *
 * @package namespace App\Http\Controllers\Admin;
 */
class ContactInfosController extends Controller
{
    /**
     * @var ContactInfoRepository
     */
    protected $repository;

    /**
     * ContactInfosController constructor.
     *
     * @param ContactInfoRepository $repository
     */
    public function __construct(ContactInfoRepository $repository)
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
        $contactInfos = $this->repository->skipPresenter()->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $contactInfos,
            ]);
        }

        return view('admin.contact-info.index', compact('contactInfos'));
    }

    public function create()
    {
        return view('admin.contact-info.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContactInfoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ContactInfoCreateRequest $request)
    {
        $locale = $request->get('locale', app()->getLocale());
        $attr = $request->only($this->repository->getModel()->getFillable());
        $attr[$locale] = $request->validated();

        $contactInfo = $this->repository->create($attr);

        $response = [
            'message' => __("admin.action.created"),
            'data' => $contactInfo->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->route('contact-info.index')->with('message', $response['message']);

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
        $contactInfo = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $contactInfo,
            ]);
        }

        return view('contactInfos.show', compact('contactInfo'));
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
        $current_locale = request()->get('locale', app()->getLocale());
        app()->setLocale($current_locale);
        $item = $this->repository->skipPresenter()
            ->pushCriteria(WithTranslateCriteria::class)
            ->find($id);
        return view('admin.contact-info.form', compact('item', 'current_locale', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ContactInfoUpdateRequest $request
     * @param string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ContactInfoUpdateRequest $request, $id)
    {
        $locale = $request->get('locale', app()->getLocale());
        $attr = $request->only($this->repository->getModel()->getFillable());
        $attr[$locale] = $request->validated();
        $contactInfo = $this->repository->update($attr, $id);

        $response = [
            'message' => __("admin.action.updated"),
            'data' => $contactInfo->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->route('contact-info.index')->with('message', $response['message']);

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
