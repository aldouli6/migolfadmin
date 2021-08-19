<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserHoleRaitingAPIRequest;
use App\Http\Requests\API\UpdateUserHoleRaitingAPIRequest;
use App\Models\UserHoleRaiting;
use App\Repositories\UserHoleRaitingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UserHoleRaitingController
 * @package App\Http\Controllers\API
 */

class UserHoleRaitingAPIController extends AppBaseController
{
    /** @var  UserHoleRaitingRepository */
    private $userHoleRaitingRepository;

    public function __construct(UserHoleRaitingRepository $userHoleRaitingRepo)
    {
        $this->userHoleRaitingRepository = $userHoleRaitingRepo;
    }

    /**
     * Display a listing of the UserHoleRaiting.
     * GET|HEAD /userHoleRaitings
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $userHoleRaitings = $this->userHoleRaitingRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $userHoleRaitings->toArray(),
            __('messages.retrieved', ['model' => __('models/userHoleRaitings.plural')])
        );
    }

    /**
     * Store a newly created UserHoleRaiting in storage.
     * POST /userHoleRaitings
     *
     * @param CreateUserHoleRaitingAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserHoleRaitingAPIRequest $request)
    {
        $input = $request->all();

        $userHoleRaiting = $this->userHoleRaitingRepository->create($input);

        return $this->sendResponse(
            $userHoleRaiting->toArray(),
            __('messages.saved', ['model' => __('models/userHoleRaitings.singular')])
        );
    }

    /**
     * Display the specified UserHoleRaiting.
     * GET|HEAD /userHoleRaitings/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UserHoleRaiting $userHoleRaiting */
        $userHoleRaiting = $this->userHoleRaitingRepository->find($id);

        if (empty($userHoleRaiting)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userHoleRaitings.singular')])
            );
        }

        return $this->sendResponse(
            $userHoleRaiting->toArray(),
            __('messages.retrieved', ['model' => __('models/userHoleRaitings.singular')])
        );
    }

    /**
     * Update the specified UserHoleRaiting in storage.
     * PUT/PATCH /userHoleRaitings/{id}
     *
     * @param int $id
     * @param UpdateUserHoleRaitingAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserHoleRaitingAPIRequest $request)
    {
        $input = $request->all();

        /** @var UserHoleRaiting $userHoleRaiting */
        $userHoleRaiting = $this->userHoleRaitingRepository->find($id);

        if (empty($userHoleRaiting)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userHoleRaitings.singular')])
            );
        }

        $userHoleRaiting = $this->userHoleRaitingRepository->update($input, $id);

        return $this->sendResponse(
            $userHoleRaiting->toArray(),
            __('messages.updated', ['model' => __('models/userHoleRaitings.singular')])
        );
    }

    /**
     * Remove the specified UserHoleRaiting from storage.
     * DELETE /userHoleRaitings/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UserHoleRaiting $userHoleRaiting */
        $userHoleRaiting = $this->userHoleRaitingRepository->find($id);

        if (empty($userHoleRaiting)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userHoleRaitings.singular')])
            );
        }

        $userHoleRaiting->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/userHoleRaitings.singular')])
        );
    }
}
