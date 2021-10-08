<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBetRompeHandicapAPIRequest;
use App\Http\Requests\API\UpdateBetRompeHandicapAPIRequest;
use App\Models\BetRompeHandicap;
use App\Repositories\BetRompeHandicapRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BetRompeHandicapController
 * @package App\Http\Controllers\API
 */

class BetRompeHandicapAPIController extends AppBaseController
{
    /** @var  BetRompeHandicapRepository */
    private $betRompeHandicapRepository;

    public function __construct(BetRompeHandicapRepository $betRompeHandicapRepo)
    {
        $this->betRompeHandicapRepository = $betRompeHandicapRepo;
    }

    /**
     * Display a listing of the BetRompeHandicap.
     * GET|HEAD /betRompeHandicaps
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $betRompeHandicaps = $this->betRompeHandicapRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $betRompeHandicaps->toArray(),
            __('messages.retrieved', ['model' => __('models/betRompeHandicaps.plural')])
        );
    }

    /**
     * Store a newly created BetRompeHandicap in storage.
     * POST /betRompeHandicaps
     *
     * @param CreateBetRompeHandicapAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBetRompeHandicapAPIRequest $request)
    {
        $input = $request->all();

        $betRompeHandicap = $this->betRompeHandicapRepository->create($input);

        return $this->sendResponse(
            $betRompeHandicap->toArray(),
            __('messages.saved', ['model' => __('models/betRompeHandicaps.singular')])
        );
    }

    /**
     * Display the specified BetRompeHandicap.
     * GET|HEAD /betRompeHandicaps/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BetRompeHandicap $betRompeHandicap */
        $betRompeHandicap = $this->betRompeHandicapRepository->find($id);

        if (empty($betRompeHandicap)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betRompeHandicaps.singular')])
            );
        }

        return $this->sendResponse(
            $betRompeHandicap->toArray(),
            __('messages.retrieved', ['model' => __('models/betRompeHandicaps.singular')])
        );
    }

    /**
     * Update the specified BetRompeHandicap in storage.
     * PUT/PATCH /betRompeHandicaps/{id}
     *
     * @param int $id
     * @param UpdateBetRompeHandicapAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBetRompeHandicapAPIRequest $request)
    {
        $input = $request->all();

        /** @var BetRompeHandicap $betRompeHandicap */
        $betRompeHandicap = $this->betRompeHandicapRepository->find($id);

        if (empty($betRompeHandicap)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betRompeHandicaps.singular')])
            );
        }

        $betRompeHandicap = $this->betRompeHandicapRepository->update($input, $id);

        return $this->sendResponse(
            $betRompeHandicap->toArray(),
            __('messages.updated', ['model' => __('models/betRompeHandicaps.singular')])
        );
    }

    /**
     * Remove the specified BetRompeHandicap from storage.
     * DELETE /betRompeHandicaps/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BetRompeHandicap $betRompeHandicap */
        $betRompeHandicap = $this->betRompeHandicapRepository->find($id);

        if (empty($betRompeHandicap)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betRompeHandicaps.singular')])
            );
        }

        $betRompeHandicap->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/betRompeHandicaps.singular')])
        );
    }
}
