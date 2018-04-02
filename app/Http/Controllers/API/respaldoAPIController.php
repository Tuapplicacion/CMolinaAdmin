<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreaterespaldoAPIRequest;
use App\Http\Requests\API\UpdaterespaldoAPIRequest;
use App\Models\respaldo;
use App\Repositories\respaldoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class respaldoController
 * @package App\Http\Controllers\API
 */

class respaldoAPIController extends AppBaseController
{
    /** @var  respaldoRepository */
    private $respaldoRepository;

    public function __construct(respaldoRepository $respaldoRepo)
    {
        $this->respaldoRepository = $respaldoRepo;
    }

    /**
     * Display a listing of the respaldo.
     * GET|HEAD /respaldos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->respaldoRepository->pushCriteria(new RequestCriteria($request));
        $this->respaldoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $respaldos = $this->respaldoRepository->all();

        return $this->sendResponse($respaldos->toArray(), 'Respaldos retrieved successfully');
    }

    /**
     * Store a newly created respaldo in storage.
     * POST /respaldos
     *
     * @param CreaterespaldoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreaterespaldoAPIRequest $request)
    {
        $input = $request->all();

        $respaldos = $this->respaldoRepository->create($input);

        return $this->sendResponse($respaldos->toArray(), 'Respaldo saved successfully');
    }

    /**
     * Display the specified respaldo.
     * GET|HEAD /respaldos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var respaldo $respaldo */
        $respaldo = $this->respaldoRepository->findWithoutFail($id);

        if (empty($respaldo)) {
            return $this->sendError('Respaldo not found');
        }

        return $this->sendResponse($respaldo->toArray(), 'Respaldo retrieved successfully');
    }

    /**
     * Update the specified respaldo in storage.
     * PUT/PATCH /respaldos/{id}
     *
     * @param  int $id
     * @param UpdaterespaldoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterespaldoAPIRequest $request)
    {
        $input = $request->all();

        /** @var respaldo $respaldo */
        $respaldo = $this->respaldoRepository->findWithoutFail($id);

        if (empty($respaldo)) {
            return $this->sendError('Respaldo not found');
        }

        $respaldo = $this->respaldoRepository->update($input, $id);

        return $this->sendResponse($respaldo->toArray(), 'respaldo updated successfully');
    }

    /**
     * Remove the specified respaldo from storage.
     * DELETE /respaldos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var respaldo $respaldo */
        $respaldo = $this->respaldoRepository->findWithoutFail($id);

        if (empty($respaldo)) {
            return $this->sendError('Respaldo not found');
        }

        $respaldo->delete();

        return $this->sendResponse($id, 'Respaldo deleted successfully');
    }
}
