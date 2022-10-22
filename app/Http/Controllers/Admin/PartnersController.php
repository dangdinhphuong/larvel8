<?php

namespace App\Http\Controllers\Admin;

use App\Criteria\AdminSearchCriteriaCriteria;
use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerCreateRequest;
use App\Http\Requests\PartnerUpdateRequest;
use App\Repositories\Interfaces\PartnerRepository;

/**
 * Class PartnersController.
 *
 * @package namespace App\Http\Controllers\Admin;
 */
class PartnersController extends Controller
{
    /**
     * @var PartnerRepository
     */
    protected $repository;


    /**
     * PartnersController constructor.
     *
     * @param PartnerRepository $repository
     */
    public function __construct(PartnerRepository $repository)
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
        $partners = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $partners,
            ]);
        }

        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PartnerCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PartnerCreateRequest $request)
    {


        $partner = $this->repository->create($request->validated());
        $response = [
            'message' => __("admin.action.created"),
            'data' => $partner->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->route('partner.index')->with('message', $response['message']);

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
        $partner = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $partner,
            ]);
        }

        return view('partners.show', compact('partner'));
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
        return view('admin.partners.form', compact('item', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PartnerUpdateRequest $request
     * @param string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PartnerUpdateRequest $request, $id)
    {
        $partner = $this->repository->update($request->all(), $id);

        $response = [
            'message' => __("admin.action.updated"),
            'data' => $partner->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->route('partner.index')->with('message', $response['message']);

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
