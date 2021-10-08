<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBetRayaPuntoAPIRequest;
use App\Http\Requests\API\UpdateBetRayaPuntoAPIRequest;
use App\Models\BetRayaPunto;
use App\Repositories\BetRayaPuntoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BetRayaPuntoController
 * @package App\Http\Controllers\API
 */

class BetRayaPuntoAPIController extends AppBaseController
{
    /** @var  BetRayaPuntoRepository */
    private $betRayaPuntoRepository;

    public function __construct(BetRayaPuntoRepository $betRayaPuntoRepo)
    {
        $this->betRayaPuntoRepository = $betRayaPuntoRepo;
    }

    /**
     * Display a listing of the BetRayaPunto.
     * GET|HEAD /betRayaPuntos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $betRayaPuntos = $this->betRayaPuntoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $betRayaPuntos->toArray(),
            __('messages.retrieved', ['model' => __('models/betRayaPuntos.plural')])
        );
    }

    /**
     * Store a newly created BetRayaPunto in storage.
     * POST /betRayaPuntos
     *
     * @param CreateBetRayaPuntoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBetRayaPuntoAPIRequest $request)
    {
        $input = $request->all();

        $betRayaPunto = $this->betRayaPuntoRepository->create($input);

        return $this->sendResponse(
            $betRayaPunto->toArray(),
            __('messages.saved', ['model' => __('models/betRayaPuntos.singular')])
        );
    }

    /**
     * Display the specified BetRayaPunto.
     * GET|HEAD /betRayaPuntos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BetRayaPunto $betRayaPunto */
        $betRayaPunto = $this->betRayaPuntoRepository->find($id);

        if (empty($betRayaPunto)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betRayaPuntos.singular')])
            );
        }

        return $this->sendResponse(
            $betRayaPunto->toArray(),
            __('messages.retrieved', ['model' => __('models/betRayaPuntos.singular')])
        );
    }

    /**
     * Update the specified BetRayaPunto in storage.
     * PUT/PATCH /betRayaPuntos/{id}
     *
     * @param int $id
     * @param UpdateBetRayaPuntoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBetRayaPuntoAPIRequest $request)
    {
        $input = $request->all();

        /** @var BetRayaPunto $betRayaPunto */
        $betRayaPunto = $this->betRayaPuntoRepository->find($id);

        if (empty($betRayaPunto)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betRayaPuntos.singular')])
            );
        }

        $betRayaPunto = $this->betRayaPuntoRepository->update($input, $id);

        return $this->sendResponse(
            $betRayaPunto->toArray(),
            __('messages.updated', ['model' => __('models/betRayaPuntos.singular')])
        );
    }

    /**
     * Remove the specified BetRayaPunto from storage.
     * DELETE /betRayaPuntos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BetRayaPunto $betRayaPunto */
        $betRayaPunto = $this->betRayaPuntoRepository->find($id);

        if (empty($betRayaPunto)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betRayaPuntos.singular')])
            );
        }

        $betRayaPunto->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/betRayaPuntos.singular')])
        );
    }
}
