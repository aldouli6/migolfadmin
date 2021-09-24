<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTeeColorAPIRequest;
use App\Http\Requests\API\UpdateTeeColorAPIRequest;
use App\Models\TeeColor;
use App\Repositories\TeeColorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TeeColorController
 * @package App\Http\Controllers\API
 */

class TeeColorAPIController extends AppBaseController
{
    /** @var  TeeColorRepository */
    private $teeColorRepository;

    public function __construct(TeeColorRepository $teeColorRepo)
    {
        $this->teeColorRepository = $teeColorRepo;
    }

    /**
     * Display a listing of the TeeColor.
     * GET|HEAD /teeColors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $teeColors = $this->teeColorRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $teeColors->toArray(),
            __('messages.retrieved', ['model' => __('models/teeColors.plural')])
        );
    }

    /**
     * Store a newly created TeeColor in storage.
     * POST /teeColors
     *
     * @param CreateTeeColorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTeeColorAPIRequest $request)
    {
        $input = $request->all();

        $teeColor = $this->teeColorRepository->create($input);

        return $this->sendResponse(
            $teeColor->toArray(),
            __('messages.saved', ['model' => __('models/teeColors.singular')])
        );
    }

    /**
     * Display the specified TeeColor.
     * GET|HEAD /teeColors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TeeColor $teeColor */
        $teeColor = $this->teeColorRepository->find($id);

        if (empty($teeColor)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/teeColors.singular')])
            );
        }

        return $this->sendResponse(
            $teeColor->toArray(),
            __('messages.retrieved', ['model' => __('models/teeColors.singular')])
        );
    }

    /**
     * Update the specified TeeColor in storage.
     * PUT/PATCH /teeColors/{id}
     *
     * @param int $id
     * @param UpdateTeeColorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeeColorAPIRequest $request)
    {
        $input = $request->all();

        /** @var TeeColor $teeColor */
        $teeColor = $this->teeColorRepository->find($id);

        if (empty($teeColor)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/teeColors.singular')])
            );
        }

        $teeColor = $this->teeColorRepository->update($input, $id);

        return $this->sendResponse(
            $teeColor->toArray(),
            __('messages.updated', ['model' => __('models/teeColors.singular')])
        );
    }

    /**
     * Remove the specified TeeColor from storage.
     * DELETE /teeColors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TeeColor $teeColor */
        $teeColor = $this->teeColorRepository->find($id);

        if (empty($teeColor)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/teeColors.singular')])
            );
        }

        $teeColor->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/teeColors.singular')])
        );
    }
}
