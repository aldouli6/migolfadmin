<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserHoleRaitingRequest;
use App\Http\Requests\UpdateUserHoleRaitingRequest;
use App\Repositories\UserHoleRaitingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class UserHoleRaitingController extends AppBaseController
{
    /** @var  UserHoleRaitingRepository */
    private $userHoleRaitingRepository;

    public function __construct(UserHoleRaitingRepository $userHoleRaitingRepo)
    {
        $this->userHoleRaitingRepository = $userHoleRaitingRepo;
    }

    /**
     * Display a listing of the UserHoleRaiting.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $userHoleRaitings = $this->userHoleRaitingRepository->all();

        return view('user_hole_raitings.index')
            ->with('userHoleRaitings', $userHoleRaitings);
    }

    /**
     * Show the form for creating a new UserHoleRaiting.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_hole_raitings.create');
    }

    /**
     * Store a newly created UserHoleRaiting in storage.
     *
     * @param CreateUserHoleRaitingRequest $request
     *
     * @return Response
     */
    public function store(CreateUserHoleRaitingRequest $request)
    {
        $input = $request->all();

        $userHoleRaiting = $this->userHoleRaitingRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/userHoleRaitings.singular')]));

        return redirect(route('userHoleRaitings.index'));
    }

    /**
     * Display the specified UserHoleRaiting.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userHoleRaiting = $this->userHoleRaitingRepository->find($id);

        if (empty($userHoleRaiting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userHoleRaitings.singular')]));

            return redirect(route('userHoleRaitings.index'));
        }

        return view('user_hole_raitings.show')->with('userHoleRaiting', $userHoleRaiting);
    }

    /**
     * Show the form for editing the specified UserHoleRaiting.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userHoleRaiting = $this->userHoleRaitingRepository->find($id);

        if (empty($userHoleRaiting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userHoleRaitings.singular')]));

            return redirect(route('userHoleRaitings.index'));
        }

        return view('user_hole_raitings.edit')->with('userHoleRaiting', $userHoleRaiting);
    }

    /**
     * Update the specified UserHoleRaiting in storage.
     *
     * @param int $id
     * @param UpdateUserHoleRaitingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserHoleRaitingRequest $request)
    {
        $userHoleRaiting = $this->userHoleRaitingRepository->find($id);

        if (empty($userHoleRaiting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userHoleRaitings.singular')]));

            return redirect(route('userHoleRaitings.index'));
        }

        $userHoleRaiting = $this->userHoleRaitingRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/userHoleRaitings.singular')]));

        return redirect(route('userHoleRaitings.index'));
    }

    /**
     * Remove the specified UserHoleRaiting from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userHoleRaiting = $this->userHoleRaitingRepository->find($id);

        if (empty($userHoleRaiting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userHoleRaitings.singular')]));

            return redirect(route('userHoleRaitings.index'));
        }

        $this->userHoleRaitingRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/userHoleRaitings.singular')]));

        return redirect(route('userHoleRaitings.index'));
    }
}
