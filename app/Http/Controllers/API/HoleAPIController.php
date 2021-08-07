<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHoleAPIRequest;
use App\Http\Requests\API\UpdateHoleAPIRequest;
use App\Models\Hole;
use App\Repositories\HoleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class HoleController
 * @package App\Http\Controllers\API
 */

class HoleAPIController extends AppBaseController
{
    /** @var  HoleRepository */
    private $holeRepository;

    public function __construct(HoleRepository $holeRepo)
    {
        $this->holeRepository = $holeRepo;
    }

    /**
     * Display a listing of the Hole.
     * GET|HEAD /holes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $holes = $this->holeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $holes->toArray(),
            __('messages.retrieved', ['model' => __('models/holes.plural')])
        );
    }

    /**
     * Store a newly created Hole in storage.
     * POST /holes
     *
     * @param CreateHoleAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateHoleAPIRequest $request)
    {
        $input = $request->all();

        $hole = $this->holeRepository->create($input);

        return $this->sendResponse(
            $hole->toArray(),
            __('messages.saved', ['model' => __('models/holes.singular')])
        );
    }

    /**
     * Display the specified Hole.
     * GET|HEAD /holes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Hole $hole */
        $hole = $this->holeRepository->find($id);

        if (empty($hole)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/holes.singular')])
            );
        }

        return $this->sendResponse(
            $hole->toArray(),
            __('messages.retrieved', ['model' => __('models/holes.singular')])
        );
    }

    /**
     * Update the specified Hole in storage.
     * PUT/PATCH /holes/{id}
     *
     * @param int $id
     * @param UpdateHoleAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHoleAPIRequest $request)
    {
        $input = $request->all();

        /** @var Hole $hole */
        $hole = $this->holeRepository->find($id);

        if (empty($hole)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/holes.singular')])
            );
        }

        $hole = $this->holeRepository->update($input, $id);

        return $this->sendResponse(
            $hole->toArray(),
            __('messages.updated', ['model' => __('models/holes.singular')])
        );
    }

    /**
     * Remove the specified Hole from storage.
     * DELETE /holes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Hole $hole */
        $hole = $this->holeRepository->find($id);

        if (empty($hole)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/holes.singular')])
            );
        }

        $hole->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/holes.singular')])
        );
    }
}
