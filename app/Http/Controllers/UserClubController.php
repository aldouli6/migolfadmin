<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserClubRequest;
use App\Http\Requests\UpdateUserClubRequest;
use App\Repositories\UserClubRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class UserClubController extends AppBaseController
{
    /** @var  UserClubRepository */
    private $userClubRepository;

    public function __construct(UserClubRepository $userClubRepo)
    {
        $this->userClubRepository = $userClubRepo;
    }

    /**
     * Display a listing of the UserClub.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $userClubs = $this->userClubRepository->all();

        return view('user_clubs.index')
            ->with('userClubs', $userClubs);
    }

    /**
     * Show the form for creating a new UserClub.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_clubs.create');
    }

    /**
     * Store a newly created UserClub in storage.
     *
     * @param CreateUserClubRequest $request
     *
     * @return Response
     */
    public function store(CreateUserClubRequest $request)
    {
        $input = $request->all();

        $userClub = $this->userClubRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/userClubs.singular')]));

        return redirect(route('userClubs.index'));
    }

    /**
     * Display the specified UserClub.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userClub = $this->userClubRepository->find($id);

        if (empty($userClub)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userClubs.singular')]));

            return redirect(route('userClubs.index'));
        }

        return view('user_clubs.show')->with('userClub', $userClub);
    }

    /**
     * Show the form for editing the specified UserClub.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userClub = $this->userClubRepository->find($id);

        if (empty($userClub)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userClubs.singular')]));

            return redirect(route('userClubs.index'));
        }

        return view('user_clubs.edit')->with('userClub', $userClub);
    }

    /**
     * Update the specified UserClub in storage.
     *
     * @param int $id
     * @param UpdateUserClubRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserClubRequest $request)
    {
        $userClub = $this->userClubRepository->find($id);

        if (empty($userClub)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userClubs.singular')]));

            return redirect(route('userClubs.index'));
        }

        $userClub = $this->userClubRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/userClubs.singular')]));

        return redirect(route('userClubs.index'));
    }

    /**
     * Remove the specified UserClub from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userClub = $this->userClubRepository->find($id);

        if (empty($userClub)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userClubs.singular')]));

            return redirect(route('userClubs.index'));
        }

        $this->userClubRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/userClubs.singular')]));

        return redirect(route('userClubs.index'));
    }
}
