<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBetStablefordAPIRequest;
use App\Http\Requests\API\UpdateBetStablefordAPIRequest;
use App\Models\BetStableford;
use App\Repositories\BetStablefordRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BetStablefordController
 * @package App\Http\Controllers\API
 */

class BetStablefordAPIController extends AppBaseController
{
    /** @var  BetStablefordRepository */
    private $betStablefordRepository;

    public function __construct(BetStablefordRepository $betStablefordRepo)
    {
        $this->betStablefordRepository = $betStablefordRepo;
    }

    /**
     * Display a listing of the BetStableford.
     * GET|HEAD /betStablefords
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $betStablefords = $this->betStablefordRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $betStablefords->toArray(),
            __('messages.retrieved', ['model' => __('models/betStablefords.plural')])
        );
    }

    /**
     * Store a newly created BetStableford in storage.
     * POST /betStablefords
     *
     * @param CreateBetStablefordAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBetStablefordAPIRequest $request)
    {
        $input = $request->all();

        $betStableford = $this->betStablefordRepository->create($input);

        return $this->sendResponse(
            $betStableford->toArray(),
            __('messages.saved', ['model' => __('models/betStablefords.singular')])
        );
    }

    /**
     * Display the specified BetStableford.
     * GET|HEAD /betStablefords/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BetStableford $betStableford */
        $betStableford = $this->betStablefordRepository->find($id);

        if (empty($betStableford)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betStablefords.singular')])
            );
        }

        return $this->sendResponse(
            $betStableford->toArray(),
            __('messages.retrieved', ['model' => __('models/betStablefords.singular')])
        );
    }

    /**
     * Update the specified BetStableford in storage.
     * PUT/PATCH /betStablefords/{id}
     *
     * @param int $id
     * @param UpdateBetStablefordAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBetStablefordAPIRequest $request)
    {
        $input = $request->all();

        /** @var BetStableford $betStableford */
        $betStableford = $this->betStablefordRepository->find($id);

        if (empty($betStableford)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betStablefords.singular')])
            );
        }

        $betStableford = $this->betStablefordRepository->update($input, $id);

        return $this->sendResponse(
            $betStableford->toArray(),
            __('messages.updated', ['model' => __('models/betStablefords.singular')])
        );
    }

    /**
     * Remove the specified BetStableford from storage.
     * DELETE /betStablefords/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BetStableford $betStableford */
        $betStableford = $this->betStablefordRepository->find($id);

        if (empty($betStableford)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betStablefords.singular')])
            );
        }

        $betStableford->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/betStablefords.singular')])
        );
    }
}
