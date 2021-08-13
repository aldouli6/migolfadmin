<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCourseTeeDefaultAPIRequest;
use App\Http\Requests\API\UpdateCourseTeeDefaultAPIRequest;
use App\Models\CourseTeeDefault;
use App\Repositories\CourseTeeDefaultRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CourseTeeDefaultController
 * @package App\Http\Controllers\API
 */

class CourseTeeDefaultAPIController extends AppBaseController
{
    /** @var  CourseTeeDefaultRepository */
    private $courseTeeDefaultRepository;

    public function __construct(CourseTeeDefaultRepository $courseTeeDefaultRepo)
    {
        $this->courseTeeDefaultRepository = $courseTeeDefaultRepo;
    }

    /**
     * Display a listing of the CourseTeeDefault.
     * GET|HEAD /courseTeeDefaults
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $courseTeeDefaults = $this->courseTeeDefaultRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $courseTeeDefaults->toArray(),
            __('messages.retrieved', ['model' => __('models/courseTeeDefaults.plural')])
        );
    }

    /**
     * Store a newly created CourseTeeDefault in storage.
     * POST /courseTeeDefaults
     *
     * @param CreateCourseTeeDefaultAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCourseTeeDefaultAPIRequest $request)
    {
        $input = $request->all();

        $courseTeeDefault = $this->courseTeeDefaultRepository->create($input);

        return $this->sendResponse(
            $courseTeeDefault->toArray(),
            __('messages.saved', ['model' => __('models/courseTeeDefaults.singular')])
        );
    }

    /**
     * Display the specified CourseTeeDefault.
     * GET|HEAD /courseTeeDefaults/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CourseTeeDefault $courseTeeDefault */
        $courseTeeDefault = $this->courseTeeDefaultRepository->find($id);

        if (empty($courseTeeDefault)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/courseTeeDefaults.singular')])
            );
        }

        return $this->sendResponse(
            $courseTeeDefault->toArray(),
            __('messages.retrieved', ['model' => __('models/courseTeeDefaults.singular')])
        );
    }

    /**
     * Update the specified CourseTeeDefault in storage.
     * PUT/PATCH /courseTeeDefaults/{id}
     *
     * @param int $id
     * @param UpdateCourseTeeDefaultAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCourseTeeDefaultAPIRequest $request)
    {
        $input = $request->all();

        /** @var CourseTeeDefault $courseTeeDefault */
        $courseTeeDefault = $this->courseTeeDefaultRepository->find($id);

        if (empty($courseTeeDefault)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/courseTeeDefaults.singular')])
            );
        }

        $courseTeeDefault = $this->courseTeeDefaultRepository->update($input, $id);

        return $this->sendResponse(
            $courseTeeDefault->toArray(),
            __('messages.updated', ['model' => __('models/courseTeeDefaults.singular')])
        );
    }

    /**
     * Remove the specified CourseTeeDefault from storage.
     * DELETE /courseTeeDefaults/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CourseTeeDefault $courseTeeDefault */
        $courseTeeDefault = $this->courseTeeDefaultRepository->find($id);

        if (empty($courseTeeDefault)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/courseTeeDefaults.singular')])
            );
        }

        $courseTeeDefault->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/courseTeeDefaults.singular')])
        );
    }
}
