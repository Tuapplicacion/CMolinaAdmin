<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreaterespaldoRequest;
use App\Http\Requests\UpdaterespaldoRequest;
use App\Repositories\respaldoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class respaldoController extends AppBaseController
{
    /** @var  respaldoRepository */
    private $respaldoRepository;

    public function __construct(respaldoRepository $respaldoRepo)
    {
        $this->respaldoRepository = $respaldoRepo;
    }

    /**
     * Display a listing of the respaldo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->respaldoRepository->pushCriteria(new RequestCriteria($request));
        $respaldos = $this->respaldoRepository->all();

        return view('respaldos.index')
            ->with('respaldos', $respaldos);
    }

    /**
     * Show the form for creating a new respaldo.
     *
     * @return Response
     */
    public function create()
    {
        return view('respaldos.create');
    }

    /**
     * Store a newly created respaldo in storage.
     *
     * @param CreaterespaldoRequest $request
     *
     * @return Response
     */
    public function store(CreaterespaldoRequest $request)
    {
        $input = $request->all();

        $respaldo = $this->respaldoRepository->create($input);

        Flash::success('Respaldo saved successfully.');

        return redirect(route('respaldos.index'));
    }

    /**
     * Display the specified respaldo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $respaldo = $this->respaldoRepository->findWithoutFail($id);

        if (empty($respaldo)) {
            Flash::error('Respaldo not found');

            return redirect(route('respaldos.index'));
        }

        return view('respaldos.show')->with('respaldo', $respaldo);
    }

    /**
     * Show the form for editing the specified respaldo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $respaldo = $this->respaldoRepository->findWithoutFail($id);

        if (empty($respaldo)) {
            Flash::error('Respaldo not found');

            return redirect(route('respaldos.index'));
        }

        return view('respaldos.edit')->with('respaldo', $respaldo);
    }

    /**
     * Update the specified respaldo in storage.
     *
     * @param  int              $id
     * @param UpdaterespaldoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterespaldoRequest $request)
    {
        $respaldo = $this->respaldoRepository->findWithoutFail($id);

        if (empty($respaldo)) {
            Flash::error('Respaldo not found');

            return redirect(route('respaldos.index'));
        }

        $respaldo = $this->respaldoRepository->update($request->all(), $id);

        Flash::success('Respaldo updated successfully.');

        return redirect(route('respaldos.index'));
    }

    /**
     * Remove the specified respaldo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $respaldo = $this->respaldoRepository->findWithoutFail($id);

        if (empty($respaldo)) {
            Flash::error('Respaldo not found');

            return redirect(route('respaldos.index'));
        }

        $this->respaldoRepository->delete($id);

        Flash::success('Respaldo deleted successfully.');

        return redirect(route('respaldos.index'));
    }
}
