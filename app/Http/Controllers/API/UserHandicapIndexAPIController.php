<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserHandicapIndexAPIRequest;
use App\Http\Requests\API\UpdateUserHandicapIndexAPIRequest;
use App\Models\UserHandicapIndex;
use App\Repositories\UserHandicapIndexRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UserHandicapIndexController
 * @package App\Http\Controllers\API
 */

class UserHandicapIndexAPIController extends AppBaseController
{
    /** @var  UserHandicapIndexRepository */
    private $userHandicapIndexRepository;

    public function __construct(UserHandicapIndexRepository $userHandicapIndexRepo)
    {
        $this->userHandicapIndexRepository = $userHandicapIndexRepo;
    }

    /**
     * Display a listing of the UserHandicapIndex.
     * GET|HEAD /userHandicapIndices
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $userHandicapIndices = $this->userHandicapIndexRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        return $this->sendResponse(
            $userHandicapIndices->toArray(),
            __('messages.retrieved', ['model' => __('models/userHandicapIndices.plural')])
        );
    }

    /**
     * Store a newly created UserHandicapIndex in storage.
     * POST /userHandicapIndices
     *
     * @param CreateUserHandicapIndexAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserHandicapIndexAPIRequest $request)
    {
        $input = $request->all();

        $userHandicapIndex = $this->userHandicapIndexRepository->create($input);

        return $this->sendResponse(
            $userHandicapIndex->toArray(),
            __('messages.saved', ['model' => __('models/userHandicapIndices.singular')])
        );
    }

    /**
     * Display the specified UserHandicapIndex.
     * GET|HEAD /userHandicapIndices/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UserHandicapIndex $userHandicapIndex */
        $userHandicapIndex = $this->userHandicapIndexRepository->find($id);

        if (empty($userHandicapIndex)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userHandicapIndices.singular')])
            );
        }

        return $this->sendResponse(
            $userHandicapIndex->toArray(),
            __('messages.retrieved', ['model' => __('models/userHandicapIndices.singular')])
        );
    }

    /**
     * Update the specified UserHandicapIndex in storage.
     * PUT/PATCH /userHandicapIndices/{id}
     *
     * @param int $id
     * @param UpdateUserHandicapIndexAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserHandicapIndexAPIRequest $request)
    {
        $input = $request->all();

        /** @var UserHandicapIndex $userHandicapIndex */
        $userHandicapIndex = $this->userHandicapIndexRepository->find($id);

        if (empty($userHandicapIndex)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userHandicapIndices.singular')])
            );
        }

        $userHandicapIndex = $this->userHandicapIndexRepository->update($input, $id);

        return $this->sendResponse(
            $userHandicapIndex->toArray(),
            __('messages.updated', ['model' => __('models/userHandicapIndices.singular')])
        );
    }

    /**
     * Remove the specified UserHandicapIndex from storage.
     * DELETE /userHandicapIndices/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UserHandicapIndex $userHandicapIndex */
        $userHandicapIndex = $this->userHandicapIndexRepository->find($id);

        if (empty($userHandicapIndex)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userHandicapIndices.singular')])
            );
        }

        $userHandicapIndex->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/userHandicapIndices.singular')])
        );
    }
}
