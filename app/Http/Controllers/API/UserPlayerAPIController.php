<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserPlayerAPIRequest;
use App\Http\Requests\API\UpdateUserPlayerAPIRequest;
use App\Models\UserPlayer;
use App\Repositories\UserPlayerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UserPlayerController
 * @package App\Http\Controllers\API
 */

class UserPlayerAPIController extends AppBaseController
{
    /** @var  UserPlayerRepository */
    private $userPlayerRepository;

    public function __construct(UserPlayerRepository $userPlayerRepo)
    {
        $this->userPlayerRepository = $userPlayerRepo;
    }

    /**
     * Display a listing of the UserPlayer.
     * GET|HEAD /userPlayers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $userPlayers = $this->userPlayerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $userPlayers->toArray(),
            __('messages.retrieved', ['model' => __('models/userPlayers.plural')])
        );
    }

    /**
     * Store a newly created UserPlayer in storage.
     * POST /userPlayers
     *
     * @param CreateUserPlayerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserPlayerAPIRequest $request)
    {
        $input = $request->all();

        $userPlayer = $this->userPlayerRepository->create($input);

        return $this->sendResponse(
            $userPlayer->toArray(),
            __('messages.saved', ['model' => __('models/userPlayers.singular')])
        );
    }

    /**
     * Display the specified UserPlayer.
     * GET|HEAD /userPlayers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UserPlayer $userPlayer */
        $userPlayer = $this->userPlayerRepository->find($id);

        if (empty($userPlayer)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userPlayers.singular')])
            );
        }

        return $this->sendResponse(
            $userPlayer->toArray(),
            __('messages.retrieved', ['model' => __('models/userPlayers.singular')])
        );
    }

    /**
     * Update the specified UserPlayer in storage.
     * PUT/PATCH /userPlayers/{id}
     *
     * @param int $id
     * @param UpdateUserPlayerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserPlayerAPIRequest $request)
    {
        $input = $request->all();

        /** @var UserPlayer $userPlayer */
        $userPlayer = $this->userPlayerRepository->find($id);

        if (empty($userPlayer)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userPlayers.singular')])
            );
        }

        $userPlayer = $this->userPlayerRepository->update($input, $id);

        return $this->sendResponse(
            $userPlayer->toArray(),
            __('messages.updated', ['model' => __('models/userPlayers.singular')])
        );
    }

    /**
     * Remove the specified UserPlayer from storage.
     * DELETE /userPlayers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UserPlayer $userPlayer */
        $userPlayer = $this->userPlayerRepository->find($id);

        if (empty($userPlayer)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userPlayers.singular')])
            );
        }

        $userPlayer->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/userPlayers.singular')])
        );
    }
}
