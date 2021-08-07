<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserPlayerRequest;
use App\Http\Requests\UpdateUserPlayerRequest;
use App\Repositories\UserPlayerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class UserPlayerController extends AppBaseController
{
    /** @var  UserPlayerRepository */
    private $userPlayerRepository;

    public function __construct(UserPlayerRepository $userPlayerRepo)
    {
        $this->userPlayerRepository = $userPlayerRepo;
    }

    /**
     * Display a listing of the UserPlayer.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $userPlayers = $this->userPlayerRepository->all();

        return view('user_players.index')
            ->with('userPlayers', $userPlayers);
    }

    /**
     * Show the form for creating a new UserPlayer.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_players.create');
    }

    /**
     * Store a newly created UserPlayer in storage.
     *
     * @param CreateUserPlayerRequest $request
     *
     * @return Response
     */
    public function store(CreateUserPlayerRequest $request)
    {
        $input = $request->all();

        $userPlayer = $this->userPlayerRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/userPlayers.singular')]));

        return redirect(route('userPlayers.index'));
    }

    /**
     * Display the specified UserPlayer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userPlayer = $this->userPlayerRepository->find($id);

        if (empty($userPlayer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userPlayers.singular')]));

            return redirect(route('userPlayers.index'));
        }

        return view('user_players.show')->with('userPlayer', $userPlayer);
    }

    /**
     * Show the form for editing the specified UserPlayer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userPlayer = $this->userPlayerRepository->find($id);

        if (empty($userPlayer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userPlayers.singular')]));

            return redirect(route('userPlayers.index'));
        }

        return view('user_players.edit')->with('userPlayer', $userPlayer);
    }

    /**
     * Update the specified UserPlayer in storage.
     *
     * @param int $id
     * @param UpdateUserPlayerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserPlayerRequest $request)
    {
        $userPlayer = $this->userPlayerRepository->find($id);

        if (empty($userPlayer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userPlayers.singular')]));

            return redirect(route('userPlayers.index'));
        }

        $userPlayer = $this->userPlayerRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/userPlayers.singular')]));

        return redirect(route('userPlayers.index'));
    }

    /**
     * Remove the specified UserPlayer from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userPlayer = $this->userPlayerRepository->find($id);

        if (empty($userPlayer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userPlayers.singular')]));

            return redirect(route('userPlayers.index'));
        }

        $this->userPlayerRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/userPlayers.singular')]));

        return redirect(route('userPlayers.index'));
    }
}
