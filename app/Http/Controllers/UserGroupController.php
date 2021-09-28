<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserGroupRequest;
use App\Http\Requests\UpdateUserGroupRequest;
use App\Repositories\UserGroupRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class UserGroupController extends AppBaseController
{
    /** @var  UserGroupRepository */
    private $userGroupRepository;

    public function __construct(UserGroupRepository $userGroupRepo)
    {
        $this->userGroupRepository = $userGroupRepo;
    }

    /**
     * Display a listing of the UserGroup.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $userGroups = $this->userGroupRepository->all();

        return view('user_groups.index')
            ->with('userGroups', $userGroups);
    }

    /**
     * Show the form for creating a new UserGroup.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_groups.create');
    }

    /**
     * Store a newly created UserGroup in storage.
     *
     * @param CreateUserGroupRequest $request
     *
     * @return Response
     */
    public function store(CreateUserGroupRequest $request)
    {
        $input = $request->all();

        $userGroup = $this->userGroupRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/userGroups.singular')]));

        return redirect(route('userGroups.index'));
    }

    /**
     * Display the specified UserGroup.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userGroup = $this->userGroupRepository->find($id);

        if (empty($userGroup)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userGroups.singular')]));

            return redirect(route('userGroups.index'));
        }

        return view('user_groups.show')->with('userGroup', $userGroup);
    }

    /**
     * Show the form for editing the specified UserGroup.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userGroup = $this->userGroupRepository->find($id);

        if (empty($userGroup)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userGroups.singular')]));

            return redirect(route('userGroups.index'));
        }

        return view('user_groups.edit')->with('userGroup', $userGroup);
    }

    /**
     * Update the specified UserGroup in storage.
     *
     * @param int $id
     * @param UpdateUserGroupRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserGroupRequest $request)
    {
        $userGroup = $this->userGroupRepository->find($id);

        if (empty($userGroup)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userGroups.singular')]));

            return redirect(route('userGroups.index'));
        }

        $userGroup = $this->userGroupRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/userGroups.singular')]));

        return redirect(route('userGroups.index'));
    }

    /**
     * Remove the specified UserGroup from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userGroup = $this->userGroupRepository->find($id);

        if (empty($userGroup)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userGroups.singular')]));

            return redirect(route('userGroups.index'));
        }

        $this->userGroupRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/userGroups.singular')]));

        return redirect(route('userGroups.index'));
    }
}
