<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserCourseAPIRequest;
use App\Http\Requests\API\UpdateUserCourseAPIRequest;
use App\Models\UserCourse;
use App\Repositories\UserCourseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UserCourseController
 * @package App\Http\Controllers\API
 */

class UserCourseAPIController extends AppBaseController
{
    /** @var  UserCourseRepository */
    private $userCourseRepository;

    public function __construct(UserCourseRepository $userCourseRepo)
    {
        $this->userCourseRepository = $userCourseRepo;
    }

    /**
     * Display a listing of the UserCourse.
     * GET|HEAD /userCourses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $userCourses = $this->userCourseRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $userCourses->sortByDesc('classification');
        return $this->sendResponse(
            $userCourses->toArray(),
            __('messages.retrieved', ['model' => __('models/userCourses.plural')])
        );
    }

    /**
     * Store a newly created UserCourse in storage.
     * POST /userCourses
     *
     * @param CreateUserCourseAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserCourseAPIRequest $request)
    {
        $input = $request->all();

        $userCourse = $this->userCourseRepository->create($input);

        return $this->sendResponse(
            $userCourse->toArray(),
            __('messages.saved', ['model' => __('models/userCourses.singular')])
        );
    }

    /**
     * Display the specified UserCourse.
     * GET|HEAD /userCourses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UserCourse $userCourse */
        $userCourse = $this->userCourseRepository->find($id);

        if (empty($userCourse)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userCourses.singular')])
            );
        }

        return $this->sendResponse(
            $userCourse->toArray(),
            __('messages.retrieved', ['model' => __('models/userCourses.singular')])
        );
    }

    /**
     * Update the specified UserCourse in storage.
     * PUT/PATCH /userCourses/{id}
     *
     * @param int $id
     * @param UpdateUserCourseAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserCourseAPIRequest $request)
    {
        $input = $request->all();

        /** @var UserCourse $userCourse */
        $userCourse = $this->userCourseRepository->find($id);

        if (empty($userCourse)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userCourses.singular')])
            );
        }

        $userCourse = $this->userCourseRepository->update($input, $id);

        return $this->sendResponse(
            $userCourse->toArray(),
            __('messages.updated', ['model' => __('models/userCourses.singular')])
        );
    }

    /**
     * Remove the specified UserCourse from storage.
     * DELETE /userCourses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UserCourse $userCourse */
        $userCourse = $this->userCourseRepository->find($id);

        if (empty($userCourse)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userCourses.singular')])
            );
        }

        $userCourse->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/userCourses.singular')])
        );
    }
}
