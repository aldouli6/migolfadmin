<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserClubAPIRequest;
use App\Http\Requests\API\UpdateUserClubAPIRequest;
use App\Models\UserClub;
use App\Repositories\UserClubRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UserClubController
 * @package App\Http\Controllers\API
 */

class UserClubAPIController extends AppBaseController
{
    /** @var  UserClubRepository */
    private $userClubRepository;

    public function __construct(UserClubRepository $userClubRepo)
    {
        $this->userClubRepository = $userClubRepo;
    }

    /**
     * Display a listing of the UserClub.
     * GET|HEAD /userClubs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $userClubs = $this->userClubRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $userClubs->toArray(),
            __('messages.retrieved', ['model' => __('models/userClubs.plural')])
        );
    }

    /**
     * Store a newly created UserClub in storage.
     * POST /userClubs
     *
     * @param CreateUserClubAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserClubAPIRequest $request)
    {
        $input = $request->all();

        $userClub = $this->userClubRepository->create($input);

        return $this->sendResponse(
            $userClub->toArray(),
            __('messages.saved', ['model' => __('models/userClubs.singular')])
        );
    }

    /**
     * Display the specified UserClub.
     * GET|HEAD /userClubs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UserClub $userClub */
        $userClub = $this->userClubRepository->find($id);

        if (empty($userClub)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userClubs.singular')])
            );
        }

        return $this->sendResponse(
            $userClub->toArray(),
            __('messages.retrieved', ['model' => __('models/userClubs.singular')])
        );
    }

    /**
     * Update the specified UserClub in storage.
     * PUT/PATCH /userClubs/{id}
     *
     * @param int $id
     * @param UpdateUserClubAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserClubAPIRequest $request)
    {
        $input = $request->all();

        /** @var UserClub $userClub */
        $userClub = $this->userClubRepository->find($id);

        if (empty($userClub)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userClubs.singular')])
            );
        }

        $userClub = $this->userClubRepository->update($input, $id);

        return $this->sendResponse(
            $userClub->toArray(),
            __('messages.updated', ['model' => __('models/userClubs.singular')])
        );
    }

    /**
     * Remove the specified UserClub from storage.
     * DELETE /userClubs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UserClub $userClub */
        $userClub = $this->userClubRepository->find($id);

        if (empty($userClub)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userClubs.singular')])
            );
        }

        $userClub->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/userClubs.singular')])
        );
    }
}
