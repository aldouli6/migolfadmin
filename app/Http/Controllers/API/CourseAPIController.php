<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCourseAPIRequest;
use App\Http\Requests\API\UpdateCourseAPIRequest;
use App\Models\Course;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CourseController
 * @package App\Http\Controllers\API
 */

class CourseAPIController extends AppBaseController
{
    /** @var  CourseRepository */
    private $courseRepository;

    public function __construct(CourseRepository $courseRepo)
    {
        $this->courseRepository = $courseRepo;
    }

    /**
     * Display a listing of the Course.
     * GET|HEAD /courses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $courses = $this->courseRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $courses->toArray(),
            __('messages.retrieved', ['model' => __('models/courses.plural')])
        );
    }

    /**
     * Store a newly created Course in storage.
     * POST /courses
     *
     * @param CreateCourseAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCourseAPIRequest $request)
    {
        $input = $request->all();

        $course = $this->courseRepository->create($input);

        return $this->sendResponse(
            $course->toArray(),
            __('messages.saved', ['model' => __('models/courses.singular')])
        );
    }

    /**
     * Display the specified Course.
     * GET|HEAD /courses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Course $course */
        $course = $this->courseRepository->find($id);

        if (empty($course)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/courses.singular')])
            );
        }

        return $this->sendResponse(
            $course->toArray(),
            __('messages.retrieved', ['model' => __('models/courses.singular')])
        );
    }

    /**
     * Update the specified Course in storage.
     * PUT/PATCH /courses/{id}
     *
     * @param int $id
     * @param UpdateCourseAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCourseAPIRequest $request)
    {
        $input = $request->all();

        /** @var Course $course */
        $course = $this->courseRepository->find($id);

        if (empty($course)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/courses.singular')])
            );
        }

        $course = $this->courseRepository->update($input, $id);

        return $this->sendResponse(
            $course->toArray(),
            __('messages.updated', ['model' => __('models/courses.singular')])
        );
    }

    /**
     * Remove the specified Course from storage.
     * DELETE /courses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Course $course */
        $course = $this->courseRepository->find($id);

        if (empty($course)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/courses.singular')])
            );
        }

        $course->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/courses.singular')])
        );
    }
}
