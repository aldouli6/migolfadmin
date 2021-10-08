<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBetSkinAPIRequest;
use App\Http\Requests\API\UpdateBetSkinAPIRequest;
use App\Models\BetSkin;
use App\Repositories\BetSkinRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BetSkinController
 * @package App\Http\Controllers\API
 */

class BetSkinAPIController extends AppBaseController
{
    /** @var  BetSkinRepository */
    private $betSkinRepository;

    public function __construct(BetSkinRepository $betSkinRepo)
    {
        $this->betSkinRepository = $betSkinRepo;
    }

    /**
     * Display a listing of the BetSkin.
     * GET|HEAD /betSkins
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $betSkins = $this->betSkinRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $betSkins->toArray(),
            __('messages.retrieved', ['model' => __('models/betSkins.plural')])
        );
    }

    /**
     * Store a newly created BetSkin in storage.
     * POST /betSkins
     *
     * @param CreateBetSkinAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBetSkinAPIRequest $request)
    {
        $input = $request->all();

        $betSkin = $this->betSkinRepository->create($input);

        return $this->sendResponse(
            $betSkin->toArray(),
            __('messages.saved', ['model' => __('models/betSkins.singular')])
        );
    }

    /**
     * Display the specified BetSkin.
     * GET|HEAD /betSkins/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BetSkin $betSkin */
        $betSkin = $this->betSkinRepository->find($id);

        if (empty($betSkin)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betSkins.singular')])
            );
        }

        return $this->sendResponse(
            $betSkin->toArray(),
            __('messages.retrieved', ['model' => __('models/betSkins.singular')])
        );
    }

    /**
     * Update the specified BetSkin in storage.
     * PUT/PATCH /betSkins/{id}
     *
     * @param int $id
     * @param UpdateBetSkinAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBetSkinAPIRequest $request)
    {
        $input = $request->all();

        /** @var BetSkin $betSkin */
        $betSkin = $this->betSkinRepository->find($id);

        if (empty($betSkin)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betSkins.singular')])
            );
        }

        $betSkin = $this->betSkinRepository->update($input, $id);

        return $this->sendResponse(
            $betSkin->toArray(),
            __('messages.updated', ['model' => __('models/betSkins.singular')])
        );
    }

    /**
     * Remove the specified BetSkin from storage.
     * DELETE /betSkins/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BetSkin $betSkin */
        $betSkin = $this->betSkinRepository->find($id);

        if (empty($betSkin)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betSkins.singular')])
            );
        }

        $betSkin->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/betSkins.singular')])
        );
    }
}
