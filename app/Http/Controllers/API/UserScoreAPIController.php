<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserScoreAPIRequest;
use App\Http\Requests\API\UpdateUserScoreAPIRequest;
use App\Models\UserScore;
use App\Repositories\UserScoreRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UserScoreController
 * @package App\Http\Controllers\API
 */

class UserScoreAPIController extends AppBaseController
{
    /** @var  UserScoreRepository */
    private $userScoreRepository;

    public function __construct(UserScoreRepository $userScoreRepo)
    {
        $this->userScoreRepository = $userScoreRepo;
    }

    /**
     * Display a listing of the UserScore.
     * GET|HEAD /userScores
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $userScores = $this->userScoreRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $userScores->toArray(),
            __('messages.retrieved', ['model' => __('models/userScores.plural')])
        );
    }

    /**
     * Store a newly created UserScore in storage.
     * POST /userScores
     *
     * @param CreateUserScoreAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserScoreAPIRequest $request)
    {
        $input = $request->all();

        $userScore = $this->userScoreRepository->create($input);

        return $this->sendResponse(
            $userScore->toArray(),
            __('messages.saved', ['model' => __('models/userScores.singular')])
        );
    }

    /**
     * Display the specified UserScore.
     * GET|HEAD /userScores/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UserScore $userScore */
        $userScore = $this->userScoreRepository->find($id);

        if (empty($userScore)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userScores.singular')])
            );
        }

        return $this->sendResponse(
            $userScore->toArray(),
            __('messages.retrieved', ['model' => __('models/userScores.singular')])
        );
    }

    /**
     * Update the specified UserScore in storage.
     * PUT/PATCH /userScores/{id}
     *
     * @param int $id
     * @param UpdateUserScoreAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserScoreAPIRequest $request)
    {
        $input = $request->all();

        /** @var UserScore $userScore */
        $userScore = $this->userScoreRepository->find($id);

        if (empty($userScore)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userScores.singular')])
            );
        }

        $userScore = $this->userScoreRepository->update($input, $id);

        return $this->sendResponse(
            $userScore->toArray(),
            __('messages.updated', ['model' => __('models/userScores.singular')])
        );
    }

    /**
     * Remove the specified UserScore from storage.
     * DELETE /userScores/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UserScore $userScore */
        $userScore = $this->userScoreRepository->find($id);

        if (empty($userScore)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userScores.singular')])
            );
        }

        $userScore->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/userScores.singular')])
        );
    }
}
