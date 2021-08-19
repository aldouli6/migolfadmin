<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserHandicapIndexRequest;
use App\Http\Requests\UpdateUserHandicapIndexRequest;
use App\Repositories\UserHandicapIndexRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class UserHandicapIndexController extends AppBaseController
{
    /** @var  UserHandicapIndexRepository */
    private $userHandicapIndexRepository;

    public function __construct(UserHandicapIndexRepository $userHandicapIndexRepo)
    {
        $this->userHandicapIndexRepository = $userHandicapIndexRepo;
    }

    /**
     * Display a listing of the UserHandicapIndex.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $userHandicapIndices = $this->userHandicapIndexRepository->all();

        return view('user_handicap_indices.index')
            ->with('userHandicapIndices', $userHandicapIndices);
    }

    /**
     * Show the form for creating a new UserHandicapIndex.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_handicap_indices.create');
    }

    /**
     * Store a newly created UserHandicapIndex in storage.
     *
     * @param CreateUserHandicapIndexRequest $request
     *
     * @return Response
     */
    public function store(CreateUserHandicapIndexRequest $request)
    {
        $input = $request->all();

        $userHandicapIndex = $this->userHandicapIndexRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/userHandicapIndices.singular')]));

        return redirect(route('userHandicapIndices.index'));
    }

    /**
     * Display the specified UserHandicapIndex.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userHandicapIndex = $this->userHandicapIndexRepository->find($id);

        if (empty($userHandicapIndex)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userHandicapIndices.singular')]));

            return redirect(route('userHandicapIndices.index'));
        }

        return view('user_handicap_indices.show')->with('userHandicapIndex', $userHandicapIndex);
    }

    /**
     * Show the form for editing the specified UserHandicapIndex.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userHandicapIndex = $this->userHandicapIndexRepository->find($id);

        if (empty($userHandicapIndex)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userHandicapIndices.singular')]));

            return redirect(route('userHandicapIndices.index'));
        }

        return view('user_handicap_indices.edit')->with('userHandicapIndex', $userHandicapIndex);
    }

    /**
     * Update the specified UserHandicapIndex in storage.
     *
     * @param int $id
     * @param UpdateUserHandicapIndexRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserHandicapIndexRequest $request)
    {
        $userHandicapIndex = $this->userHandicapIndexRepository->find($id);

        if (empty($userHandicapIndex)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userHandicapIndices.singular')]));

            return redirect(route('userHandicapIndices.index'));
        }

        $userHandicapIndex = $this->userHandicapIndexRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/userHandicapIndices.singular')]));

        return redirect(route('userHandicapIndices.index'));
    }

    /**
     * Remove the specified UserHandicapIndex from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userHandicapIndex = $this->userHandicapIndexRepository->find($id);

        if (empty($userHandicapIndex)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userHandicapIndices.singular')]));

            return redirect(route('userHandicapIndices.index'));
        }

        $this->userHandicapIndexRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/userHandicapIndices.singular')]));

        return redirect(route('userHandicapIndices.index'));
    }
}
