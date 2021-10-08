<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBetMedalPlayAPIRequest;
use App\Http\Requests\API\UpdateBetMedalPlayAPIRequest;
use App\Models\BetMedalPlay;
use App\Repositories\BetMedalPlayRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BetMedalPlayController
 * @package App\Http\Controllers\API
 */

class BetMedalPlayAPIController extends AppBaseController
{
    /** @var  BetMedalPlayRepository */
    private $betMedalPlayRepository;

    public function __construct(BetMedalPlayRepository $betMedalPlayRepo)
    {
        $this->betMedalPlayRepository = $betMedalPlayRepo;
    }

    /**
     * Display a listing of the BetMedalPlay.
     * GET|HEAD /betMedalPlays
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $betMedalPlays = $this->betMedalPlayRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $betMedalPlays->toArray(),
            __('messages.retrieved', ['model' => __('models/betMedalPlays.plural')])
        );
    }

    /**
     * Store a newly created BetMedalPlay in storage.
     * POST /betMedalPlays
     *
     * @param CreateBetMedalPlayAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBetMedalPlayAPIRequest $request)
    {
        $input = $request->all();

        $betMedalPlay = $this->betMedalPlayRepository->create($input);

        return $this->sendResponse(
            $betMedalPlay->toArray(),
            __('messages.saved', ['model' => __('models/betMedalPlays.singular')])
        );
    }

    /**
     * Display the specified BetMedalPlay.
     * GET|HEAD /betMedalPlays/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BetMedalPlay $betMedalPlay */
        $betMedalPlay = $this->betMedalPlayRepository->find($id);

        if (empty($betMedalPlay)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betMedalPlays.singular')])
            );
        }

        return $this->sendResponse(
            $betMedalPlay->toArray(),
            __('messages.retrieved', ['model' => __('models/betMedalPlays.singular')])
        );
    }

    /**
     * Update the specified BetMedalPlay in storage.
     * PUT/PATCH /betMedalPlays/{id}
     *
     * @param int $id
     * @param UpdateBetMedalPlayAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBetMedalPlayAPIRequest $request)
    {
        $input = $request->all();

        /** @var BetMedalPlay $betMedalPlay */
        $betMedalPlay = $this->betMedalPlayRepository->find($id);

        if (empty($betMedalPlay)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betMedalPlays.singular')])
            );
        }

        $betMedalPlay = $this->betMedalPlayRepository->update($input, $id);

        return $this->sendResponse(
            $betMedalPlay->toArray(),
            __('messages.updated', ['model' => __('models/betMedalPlays.singular')])
        );
    }

    /**
     * Remove the specified BetMedalPlay from storage.
     * DELETE /betMedalPlays/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BetMedalPlay $betMedalPlay */
        $betMedalPlay = $this->betMedalPlayRepository->find($id);

        if (empty($betMedalPlay)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betMedalPlays.singular')])
            );
        }

        $betMedalPlay->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/betMedalPlays.singular')])
        );
    }
}
