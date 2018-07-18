<?php

namespace Modules\YNABIntegration\Http\Controllers;

use Auth;
use App\Http\Controllers\BaseController;
use App\Services\DatatableService;
use Modules\YNABIntegration\Datatables\YNABIntegrationDatatable;
use Modules\YNABIntegration\Repositories\YNABIntegrationRepository;
use Modules\YNABIntegration\Http\Requests\YNABIntegrationRequest;
use Modules\YNABIntegration\Http\Requests\CreateYNABIntegrationRequest;
use Modules\YNABIntegration\Http\Requests\UpdateYNABIntegrationRequest;

class YNABIntegrationController extends BaseController
{
    protected $YNABIntegrationRepo;
    //protected $entityType = 'ynabintegration';

    public function __construct(YNABIntegrationRepository $ynabintegrationRepo)
    {
        //parent::__construct();

        $this->ynabintegrationRepo = $ynabintegrationRepo;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('list_wrapper', [
            'entityType' => 'ynabintegration',
            'datatable' => new YNABIntegrationDatatable(),
            'title' => mtrans('ynabintegration', 'ynabintegration_list'),
        ]);
    }

    public function datatable(DatatableService $datatableService)
    {
        $search = request()->input('sSearch');
        $userId = Auth::user()->filterId();

        $datatable = new YNABIntegrationDatatable();
        $query = $this->ynabintegrationRepo->find($search, $userId);

        return $datatableService->createDatatable($datatable, $query);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(YNABIntegrationRequest $request)
    {
        $data = [
            'ynabintegration' => null,
            'method' => 'POST',
            'url' => 'ynabintegration',
            'title' => mtrans('ynabintegration', 'new_ynabintegration'),
        ];

        return view('ynabintegration::edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateYNABIntegrationRequest $request)
    {
        $ynabintegration = $this->ynabintegrationRepo->save($request->input());

        return redirect()->to($ynabintegration->present()->editUrl)
            ->with('message', mtrans('ynabintegration', 'created_ynabintegration'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(YNABIntegrationRequest $request)
    {
        $ynabintegration = $request->entity();

        $data = [
            'ynabintegration' => $ynabintegration,
            'method' => 'PUT',
            'url' => 'ynabintegration/' . $ynabintegration->public_id,
            'title' => mtrans('ynabintegration', 'edit_ynabintegration'),
        ];

        return view('ynabintegration::edit', $data);
    }

    /**
     * Show the form for editing a resource.
     * @return Response
     */
    public function show(YNABIntegrationRequest $request)
    {
        return redirect()->to("ynabintegration/{$request->ynabintegration}/edit");
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateYNABIntegrationRequest $request)
    {
        $ynabintegration = $this->ynabintegrationRepo->save($request->input(), $request->entity());

        return redirect()->to($ynabintegration->present()->editUrl)
            ->with('message', mtrans('ynabintegration', 'updated_ynabintegration'));
    }

    /**
     * Update multiple resources
     */
    public function bulk()
    {
        $action = request()->input('action');
        $ids = request()->input('public_id') ?: request()->input('ids');
        $count = $this->ynabintegrationRepo->bulk($ids, $action);

        return redirect()->to('ynabintegration')
            ->with('message', mtrans('ynabintegration', $action . '_ynabintegration_complete'));
    }
}
