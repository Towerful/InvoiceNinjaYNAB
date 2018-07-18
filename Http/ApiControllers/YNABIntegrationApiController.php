<?php

namespace Modules\YNABIntegration\Http\ApiControllers;

use App\Http\Controllers\BaseAPIController;
use Modules\Ynabintegration\Repositories\YnabintegrationRepository;
use Modules\Ynabintegration\Http\Requests\YnabintegrationRequest;
use Modules\Ynabintegration\Http\Requests\CreateYnabintegrationRequest;
use Modules\Ynabintegration\Http\Requests\UpdateYnabintegrationRequest;

class YnabintegrationApiController extends BaseAPIController
{
    protected $YnabintegrationRepo;
    protected $entityType = 'ynabintegration';

    public function __construct(YnabintegrationRepository $ynabintegrationRepo)
    {
        parent::__construct();

        $this->ynabintegrationRepo = $ynabintegrationRepo;
    }

    /**
     * @SWG\Get(
     *   path="/ynabintegration",
     *   summary="List ynabintegration",
     *   operationId="listYnabintegrations",
     *   tags={"ynabintegration"},
     *   @SWG\Response(
     *     response=200,
     *     description="A list of ynabintegration",
     *      @SWG\Schema(type="array", @SWG\Items(ref="#/definitions/Ynabintegration"))
     *   ),
     *   @SWG\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */
    public function index()
    {
        $data = $this->ynabintegrationRepo->all();

        return $this->listResponse($data);
    }

    /**
     * @SWG\Get(
     *   path="/ynabintegration/{ynabintegration_id}",
     *   summary="Individual Ynabintegration",
     *   operationId="getYnabintegration",
     *   tags={"ynabintegration"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="ynabintegration_id",
     *     type="integer",
     *     required=true
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="A single ynabintegration",
     *      @SWG\Schema(type="object", @SWG\Items(ref="#/definitions/Ynabintegration"))
     *   ),
     *   @SWG\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */
    public function show(YnabintegrationRequest $request)
    {
        return $this->itemResponse($request->entity());
    }




    /**
     * @SWG\Post(
     *   path="/ynabintegration",
     *   summary="Create a ynabintegration",
     *   operationId="createYnabintegration",
     *   tags={"ynabintegration"},
     *   @SWG\Parameter(
     *     in="body",
     *     name="ynabintegration",
     *     @SWG\Schema(ref="#/definitions/Ynabintegration")
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="New ynabintegration",
     *      @SWG\Schema(type="object", @SWG\Items(ref="#/definitions/Ynabintegration"))
     *   ),
     *   @SWG\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */
    public function store(CreateYnabintegrationRequest $request)
    {
        $ynabintegration = $this->ynabintegrationRepo->save($request->input());

        return $this->itemResponse($ynabintegration);
    }

    /**
     * @SWG\Put(
     *   path="/ynabintegration/{ynabintegration_id}",
     *   summary="Update a ynabintegration",
     *   operationId="updateYnabintegration",
     *   tags={"ynabintegration"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="ynabintegration_id",
     *     type="integer",
     *     required=true
     *   ),
     *   @SWG\Parameter(
     *     in="body",
     *     name="ynabintegration",
     *     @SWG\Schema(ref="#/definitions/Ynabintegration")
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="Updated ynabintegration",
     *      @SWG\Schema(type="object", @SWG\Items(ref="#/definitions/Ynabintegration"))
     *   ),
     *   @SWG\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */
    public function update(UpdateYnabintegrationRequest $request, $publicId)
    {
        if ($request->action) {
            return $this->handleAction($request);
        }

        $ynabintegration = $this->ynabintegrationRepo->save($request->input(), $request->entity());

        return $this->itemResponse($ynabintegration);
    }


    /**
     * @SWG\Delete(
     *   path="/ynabintegration/{ynabintegration_id}",
     *   summary="Delete a ynabintegration",
     *   operationId="deleteYnabintegration",
     *   tags={"ynabintegration"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="ynabintegration_id",
     *     type="integer",
     *     required=true
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="Deleted ynabintegration",
     *      @SWG\Schema(type="object", @SWG\Items(ref="#/definitions/Ynabintegration"))
     *   ),
     *   @SWG\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */
    public function destroy(UpdateYnabintegrationRequest $request)
    {
        $ynabintegration = $request->entity();

        $this->ynabintegrationRepo->delete($ynabintegration);

        return $this->itemResponse($ynabintegration);
    }

}
