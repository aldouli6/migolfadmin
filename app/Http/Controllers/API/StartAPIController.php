<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStartAPIRequest;
use App\Http\Requests\API\UpdateStartAPIRequest;
use App\Models\Start;
use App\Repositories\StartRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class StartController
 * @package App\Http\Controllers\API
 */

class StartAPIController extends AppBaseController
{
    /** @var  StartRepository */
    private $startRepository;

    public function __construct(StartRepository $startRepo)
    {
        $this->startRepository = $startRepo;
    }

    /**
     * Display a listing of the Start.
     * GET|HEAD /starts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $starts = $this->startRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $starts->toArray(),
            __('messages.retrieved', ['model' => __('models/starts.plural')])
        );
    }

    /**
     * Store a newly created Start in storage.
     * POST /starts
     *
     * @param CreateStartAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStartAPIRequest $request)
    {
        $input = $request->all();

        $start = $this->startRepository->create($input);

        return $this->sendResponse(
            $start->toArray(),
            __('messages.saved', ['model' => __('models/starts.singular')])
        );
    }

    /**
     * Display the specified Start.
     * GET|HEAD /starts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Start $start */
        $start = $this->startRepository->find($id);

        if (empty($start)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/starts.singular')])
            );
        }

        return $this->sendResponse(
            $start->toArray(),
            __('messages.retrieved', ['model' => __('models/starts.singular')])
        );
    }

    /**
     * Update the specified Start in storage.
     * PUT/PATCH /starts/{id}
     *
     * @param int $id
     * @param UpdateStartAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStartAPIRequest $request)
    {
        $input = $request->all();

        /** @var Start $start */
        $start = $this->startRepository->find($id);

        if (empty($start)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/starts.singular')])
            );
        }

        $start = $this->startRepository->update($input, $id);

        return $this->sendResponse(
            $start->toArray(),
            __('messages.updated', ['model' => __('models/starts.singular')])
        );
    }

    /**
     * Remove the specified Start from storage.
     * DELETE /starts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Start $start */
        $start = $this->startRepository->find($id);

        if (empty($start)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/starts.singular')])
            );
        }

        $start->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/starts.singular')])
        );
    }
}
