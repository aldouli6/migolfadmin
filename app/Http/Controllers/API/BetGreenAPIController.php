<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBetGreenAPIRequest;
use App\Http\Requests\API\UpdateBetGreenAPIRequest;
use App\Models\BetGreen;
use App\Repositories\BetGreenRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BetGreenController
 * @package App\Http\Controllers\API
 */

class BetGreenAPIController extends AppBaseController
{
    /** @var  BetGreenRepository */
    private $betGreenRepository;

    public function __construct(BetGreenRepository $betGreenRepo)
    {
        $this->betGreenRepository = $betGreenRepo;
    }

    /**
     * Display a listing of the BetGreen.
     * GET|HEAD /betGreens
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $betGreens = $this->betGreenRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $betGreens->toArray(),
            __('messages.retrieved', ['model' => __('models/betGreens.plural')])
        );
    }

    /**
     * Store a newly created BetGreen in storage.
     * POST /betGreens
     *
     * @param CreateBetGreenAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBetGreenAPIRequest $request)
    {
        $input = $request->all();

        $betGreen = $this->betGreenRepository->create($input);

        return $this->sendResponse(
            $betGreen->toArray(),
            __('messages.saved', ['model' => __('models/betGreens.singular')])
        );
    }

    /**
     * Display the specified BetGreen.
     * GET|HEAD /betGreens/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BetGreen $betGreen */
        $betGreen = $this->betGreenRepository->find($id);

        if (empty($betGreen)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betGreens.singular')])
            );
        }

        return $this->sendResponse(
            $betGreen->toArray(),
            __('messages.retrieved', ['model' => __('models/betGreens.singular')])
        );
    }

    /**
     * Update the specified BetGreen in storage.
     * PUT/PATCH /betGreens/{id}
     *
     * @param int $id
     * @param UpdateBetGreenAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBetGreenAPIRequest $request)
    {
        $input = $request->all();

        /** @var BetGreen $betGreen */
        $betGreen = $this->betGreenRepository->find($id);

        if (empty($betGreen)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betGreens.singular')])
            );
        }

        $betGreen = $this->betGreenRepository->update($input, $id);

        return $this->sendResponse(
            $betGreen->toArray(),
            __('messages.updated', ['model' => __('models/betGreens.singular')])
        );
    }

    /**
     * Remove the specified BetGreen from storage.
     * DELETE /betGreens/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BetGreen $betGreen */
        $betGreen = $this->betGreenRepository->find($id);

        if (empty($betGreen)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betGreens.singular')])
            );
        }

        $betGreen->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/betGreens.singular')])
        );
    }
}
