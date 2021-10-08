<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBetRayaPuntoRequest;
use App\Http\Requests\UpdateBetRayaPuntoRequest;
use App\Repositories\BetRayaPuntoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BetRayaPuntoController extends AppBaseController
{
    /** @var  BetRayaPuntoRepository */
    private $betRayaPuntoRepository;

    public function __construct(BetRayaPuntoRepository $betRayaPuntoRepo)
    {
        $this->betRayaPuntoRepository = $betRayaPuntoRepo;
    }

    /**
     * Display a listing of the BetRayaPunto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $betRayaPuntos = $this->betRayaPuntoRepository->all();

        return view('bet_raya_puntos.index')
            ->with('betRayaPuntos', $betRayaPuntos);
    }

    /**
     * Show the form for creating a new BetRayaPunto.
     *
     * @return Response
     */
    public function create()
    {
        return view('bet_raya_puntos.create');
    }

    /**
     * Store a newly created BetRayaPunto in storage.
     *
     * @param CreateBetRayaPuntoRequest $request
     *
     * @return Response
     */
    public function store(CreateBetRayaPuntoRequest $request)
    {
        $input = $request->all();

        $betRayaPunto = $this->betRayaPuntoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/betRayaPuntos.singular')]));

        return redirect(route('betRayaPuntos.index'));
    }

    /**
     * Display the specified BetRayaPunto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $betRayaPunto = $this->betRayaPuntoRepository->find($id);

        if (empty($betRayaPunto)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betRayaPuntos.singular')]));

            return redirect(route('betRayaPuntos.index'));
        }

        return view('bet_raya_puntos.show')->with('betRayaPunto', $betRayaPunto);
    }

    /**
     * Show the form for editing the specified BetRayaPunto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $betRayaPunto = $this->betRayaPuntoRepository->find($id);

        if (empty($betRayaPunto)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betRayaPuntos.singular')]));

            return redirect(route('betRayaPuntos.index'));
        }

        return view('bet_raya_puntos.edit')->with('betRayaPunto', $betRayaPunto);
    }

    /**
     * Update the specified BetRayaPunto in storage.
     *
     * @param int $id
     * @param UpdateBetRayaPuntoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBetRayaPuntoRequest $request)
    {
        $betRayaPunto = $this->betRayaPuntoRepository->find($id);

        if (empty($betRayaPunto)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betRayaPuntos.singular')]));

            return redirect(route('betRayaPuntos.index'));
        }

        $betRayaPunto = $this->betRayaPuntoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/betRayaPuntos.singular')]));

        return redirect(route('betRayaPuntos.index'));
    }

    /**
     * Remove the specified BetRayaPunto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $betRayaPunto = $this->betRayaPuntoRepository->find($id);

        if (empty($betRayaPunto)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betRayaPuntos.singular')]));

            return redirect(route('betRayaPuntos.index'));
        }

        $this->betRayaPuntoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/betRayaPuntos.singular')]));

        return redirect(route('betRayaPuntos.index'));
    }
}
