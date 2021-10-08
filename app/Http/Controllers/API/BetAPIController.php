<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBetAPIRequest;
use App\Http\Requests\API\UpdateBetAPIRequest;
use App\Models\Bet;
use App\Repositories\BetRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BetController
 * @package App\Http\Controllers\API
 */

class BetAPIController extends AppBaseController
{
    /** @var  BetRepository */
    private $betRepository;

    public function __construct(BetRepository $betRepo)
    {
        $this->betRepository = $betRepo;
    }

    /**
     * Display a listing of the Bet.
     * GET|HEAD /bets
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bets = $this->betRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $bets->toArray(),
            __('messages.retrieved', ['model' => __('models/bets.plural')])
        );
    }

    /**
     * Store a newly created Bet in storage.
     * POST /bets
     *
     * @param CreateBetAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBetAPIRequest $request)
    {
        $input = $request->all();

        $bet = $this->betRepository->create($input);

        return $this->sendResponse(
            $bet->toArray(),
            __('messages.saved', ['model' => __('models/bets.singular')])
        );
    }

    /**
     * Display the specified Bet.
     * GET|HEAD /bets/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Bet $bet */
        $bet = $this->betRepository->find($id);

        if (empty($bet)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/bets.singular')])
            );
        }

        return $this->sendResponse(
            $bet->toArray(),
            __('messages.retrieved', ['model' => __('models/bets.singular')])
        );
    }

    /**
     * Update the specified Bet in storage.
     * PUT/PATCH /bets/{id}
     *
     * @param int $id
     * @param UpdateBetAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBetAPIRequest $request)
    {
        $input = $request->all();

        /** @var Bet $bet */
        $bet = $this->betRepository->find($id);

        if (empty($bet)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/bets.singular')])
            );
        }

        $bet = $this->betRepository->update($input, $id);

        return $this->sendResponse(
            $bet->toArray(),
            __('messages.updated', ['model' => __('models/bets.singular')])
        );
    }

    /**
     * Remove the specified Bet from storage.
     * DELETE /bets/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Bet $bet */
        $bet = $this->betRepository->find($id);

        if (empty($bet)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/bets.singular')])
            );
        }

        $bet->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/bets.singular')])
        );
    }
}
