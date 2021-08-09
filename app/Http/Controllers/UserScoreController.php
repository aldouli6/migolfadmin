<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserScoreRequest;
use App\Http\Requests\UpdateUserScoreRequest;
use App\Repositories\UserScoreRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class UserScoreController extends AppBaseController
{
    /** @var  UserScoreRepository */
    private $userScoreRepository;

    public function __construct(UserScoreRepository $userScoreRepo)
    {
        $this->userScoreRepository = $userScoreRepo;
    }

    /**
     * Display a listing of the UserScore.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $userScores = $this->userScoreRepository->all();

        return view('user_scores.index')
            ->with('userScores', $userScores);
    }

    /**
     * Show the form for creating a new UserScore.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_scores.create');
    }

    /**
     * Store a newly created UserScore in storage.
     *
     * @param CreateUserScoreRequest $request
     *
     * @return Response
     */
    public function store(CreateUserScoreRequest $request)
    {
        $input = $request->all();

        $userScore = $this->userScoreRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/userScores.singular')]));

        return redirect(route('userScores.index'));
    }

    /**
     * Display the specified UserScore.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userScore = $this->userScoreRepository->find($id);

        if (empty($userScore)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userScores.singular')]));

            return redirect(route('userScores.index'));
        }

        return view('user_scores.show')->with('userScore', $userScore);
    }

    /**
     * Show the form for editing the specified UserScore.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userScore = $this->userScoreRepository->find($id);

        if (empty($userScore)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userScores.singular')]));

            return redirect(route('userScores.index'));
        }

        return view('user_scores.edit')->with('userScore', $userScore);
    }

    /**
     * Update the specified UserScore in storage.
     *
     * @param int $id
     * @param UpdateUserScoreRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserScoreRequest $request)
    {
        $userScore = $this->userScoreRepository->find($id);

        if (empty($userScore)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userScores.singular')]));

            return redirect(route('userScores.index'));
        }

        $userScore = $this->userScoreRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/userScores.singular')]));

        return redirect(route('userScores.index'));
    }

    /**
     * Remove the specified UserScore from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userScore = $this->userScoreRepository->find($id);

        if (empty($userScore)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userScores.singular')]));

            return redirect(route('userScores.index'));
        }

        $this->userScoreRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/userScores.singular')]));

        return redirect(route('userScores.index'));
    }
}
