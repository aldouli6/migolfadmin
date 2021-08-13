<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserCourseRequest;
use App\Http\Requests\UpdateUserCourseRequest;
use App\Repositories\UserCourseRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class UserCourseController extends AppBaseController
{
    /** @var  UserCourseRepository */
    private $userCourseRepository;

    public function __construct(UserCourseRepository $userCourseRepo)
    {
        $this->userCourseRepository = $userCourseRepo;
    }

    /**
     * Display a listing of the UserCourse.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $userCourses = $this->userCourseRepository->all();

        return view('user_courses.index')
            ->with('userCourses', $userCourses);
    }

    /**
     * Show the form for creating a new UserCourse.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_courses.create');
    }

    /**
     * Store a newly created UserCourse in storage.
     *
     * @param CreateUserCourseRequest $request
     *
     * @return Response
     */
    public function store(CreateUserCourseRequest $request)
    {
        $input = $request->all();

        $userCourse = $this->userCourseRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/userCourses.singular')]));

        return redirect(route('userCourses.index'));
    }

    /**
     * Display the specified UserCourse.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userCourse = $this->userCourseRepository->find($id);

        if (empty($userCourse)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userCourses.singular')]));

            return redirect(route('userCourses.index'));
        }

        return view('user_courses.show')->with('userCourse', $userCourse);
    }

    /**
     * Show the form for editing the specified UserCourse.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userCourse = $this->userCourseRepository->find($id);

        if (empty($userCourse)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userCourses.singular')]));

            return redirect(route('userCourses.index'));
        }

        return view('user_courses.edit')->with('userCourse', $userCourse);
    }

    /**
     * Update the specified UserCourse in storage.
     *
     * @param int $id
     * @param UpdateUserCourseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserCourseRequest $request)
    {
        $userCourse = $this->userCourseRepository->find($id);

        if (empty($userCourse)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userCourses.singular')]));

            return redirect(route('userCourses.index'));
        }

        $userCourse = $this->userCourseRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/userCourses.singular')]));

        return redirect(route('userCourses.index'));
    }

    /**
     * Remove the specified UserCourse from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userCourse = $this->userCourseRepository->find($id);

        if (empty($userCourse)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userCourses.singular')]));

            return redirect(route('userCourses.index'));
        }

        $this->userCourseRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/userCourses.singular')]));

        return redirect(route('userCourses.index'));
    }
}
