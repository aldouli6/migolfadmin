<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserGroupAPIRequest;
use App\Http\Requests\API\UpdateUserGroupAPIRequest;
use App\Models\UserGroup;
use App\Models\User;
use App\Repositories\UserGroupRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UserGroupController
 * @package App\Http\Controllers\API
 */

class UserGroupAPIController extends AppBaseController
{
    /** @var  UserGroupRepository */
    private $userGroupRepository;

    public function __construct(UserGroupRepository $userGroupRepo)
    {
        $this->userGroupRepository = $userGroupRepo;
    }

    /**
     * Display a listing of the UserGroup.
     * GET|HEAD /userGroups
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $userGroups = $this->userGroupRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        foreach ($userGroups as $userGroup) {
            $players = explode(',', $userGroup['players']);
            $userGroup['jugadores'] =User::whereIn('id',$players)->get(['id','name'])->toArray(); 
        }

        return $this->sendResponse(
            $userGroups->toArray(),
            __('messages.retrieved', ['model' => __('models/userGroups.plural')])
        );
    }

    /**
     * Store a newly created UserGroup in storage.
     * POST /userGroups
     *
     * @param CreateUserGroupAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserGroupAPIRequest $request)
    {
        $input = $request->all();

        $userGroup = $this->userGroupRepository->create($input);

        return $this->sendResponse(
            $userGroup->toArray(),
            __('messages.saved', ['model' => __('models/userGroups.singular')])
        );
    }

    /**
     * Display the specified UserGroup.
     * GET|HEAD /userGroups/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UserGroup $userGroup */
        $userGroup = $this->userGroupRepository->find($id);

        if (empty($userGroup)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userGroups.singular')])
            );
        }

        return $this->sendResponse(
            $userGroup->toArray(),
            __('messages.retrieved', ['model' => __('models/userGroups.singular')])
        );
    }

    /**
     * Update the specified UserGroup in storage.
     * PUT/PATCH /userGroups/{id}
     *
     * @param int $id
     * @param UpdateUserGroupAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserGroupAPIRequest $request)
    {
        $input = $request->all();

        /** @var UserGroup $userGroup */
        $userGroup = $this->userGroupRepository->find($id);

        if (empty($userGroup)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userGroups.singular')])
            );
        }

        $userGroup = $this->userGroupRepository->update($input, $id);

        return $this->sendResponse(
            $userGroup->toArray(),
            __('messages.updated', ['model' => __('models/userGroups.singular')])
        );
    }

    /**
     * Remove the specified UserGroup from storage.
     * DELETE /userGroups/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        if($id!=0){
            /** @var UserGroup $userGroup */
            $userGroup = $this->userGroupRepository->find($id);

            if (empty($userGroup)) {
                return $this->sendError(
                    __('messages.not_found', ['model' => __('models/userGroups.singular')])
                );
            }

            $userGroup->delete();

            return $this->sendResponse(
                $id,
                __('messages.deleted', ['model' => __('models/userGroups.singular')])
            );
        }else{
            $ids = $request->all();
            $userGroups = UserGroup::whereIn('id', $ids);
            // dd($userGroups->get());
            if (empty($userGroups->get()->toArray())) {
                return $this->sendError(
                    __('messages.not_found', ['model' => __('models/userGroups.singular')])
                );
            }
            $userGroups->delete();
            return $this->sendResponse(
                array("data" =>$ids),
                __('messages.deleted', ['model' => __('models/userGroups.singular')])
            );
        }
    }
}
