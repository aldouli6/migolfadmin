<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBetMatchIndividualAPIRequest;
use App\Http\Requests\API\UpdateBetMatchIndividualAPIRequest;
use App\Models\BetMatchIndividual;
use App\Repositories\BetMatchIndividualRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BetMatchIndividualController
 * @package App\Http\Controllers\API
 */

class BetMatchIndividualAPIController extends AppBaseController
{
    /** @var  BetMatchIndividualRepository */
    private $betMatchIndividualRepository;

    public function __construct(BetMatchIndividualRepository $betMatchIndividualRepo)
    {
        $this->betMatchIndividualRepository = $betMatchIndividualRepo;
    }

    /**
     * Display a listing of the BetMatchIndividual.
     * GET|HEAD /betMatchIndividuals
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $betMatchIndividuals = $this->betMatchIndividualRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $betMatchIndividuals->toArray(),
            __('messages.retrieved', ['model' => __('models/betMatchIndividuals.plural')])
        );
    }

    /**
     * Store a newly created BetMatchIndividual in storage.
     * POST /betMatchIndividuals
     *
     * @param CreateBetMatchIndividualAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBetMatchIndividualAPIRequest $request)
    {
        $input = $request->all();

        $betMatchIndividual = $this->betMatchIndividualRepository->create($input);

        return $this->sendResponse(
            $betMatchIndividual->toArray(),
            __('messages.saved', ['model' => __('models/betMatchIndividuals.singular')])
        );
    }

    /**
     * Display the specified BetMatchIndividual.
     * GET|HEAD /betMatchIndividuals/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BetMatchIndividual $betMatchIndividual */
        $betMatchIndividual = $this->betMatchIndividualRepository->find($id);

        if (empty($betMatchIndividual)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betMatchIndividuals.singular')])
            );
        }

        return $this->sendResponse(
            $betMatchIndividual->toArray(),
            __('messages.retrieved', ['model' => __('models/betMatchIndividuals.singular')])
        );
    }

    /**
     * Update the specified BetMatchIndividual in storage.
     * PUT/PATCH /betMatchIndividuals/{id}
     *
     * @param int $id
     * @param UpdateBetMatchIndividualAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBetMatchIndividualAPIRequest $request)
    {
        $input = $request->all();

        /** @var BetMatchIndividual $betMatchIndividual */
        $betMatchIndividual = $this->betMatchIndividualRepository->find($id);

        if (empty($betMatchIndividual)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betMatchIndividuals.singular')])
            );
        }

        $betMatchIndividual = $this->betMatchIndividualRepository->update($input, $id);

        return $this->sendResponse(
            $betMatchIndividual->toArray(),
            __('messages.updated', ['model' => __('models/betMatchIndividuals.singular')])
        );
    }

    /**
     * Remove the specified BetMatchIndividual from storage.
     * DELETE /betMatchIndividuals/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BetMatchIndividual $betMatchIndividual */
        $betMatchIndividual = $this->betMatchIndividualRepository->find($id);

        if (empty($betMatchIndividual)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betMatchIndividuals.singular')])
            );
        }

        $betMatchIndividual->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/betMatchIndividuals.singular')])
        );
    }
}
