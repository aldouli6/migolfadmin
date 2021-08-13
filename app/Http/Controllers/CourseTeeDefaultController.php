<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseTeeDefaultRequest;
use App\Http\Requests\UpdateCourseTeeDefaultRequest;
use App\Repositories\CourseTeeDefaultRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CourseTeeDefaultController extends AppBaseController
{
    /** @var  CourseTeeDefaultRepository */
    private $courseTeeDefaultRepository;

    public function __construct(CourseTeeDefaultRepository $courseTeeDefaultRepo)
    {
        $this->courseTeeDefaultRepository = $courseTeeDefaultRepo;
    }

    /**
     * Display a listing of the CourseTeeDefault.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $courseTeeDefaults = $this->courseTeeDefaultRepository->all();

        return view('course_tee_defaults.index')
            ->with('courseTeeDefaults', $courseTeeDefaults);
    }

    /**
     * Show the form for creating a new CourseTeeDefault.
     *
     * @return Response
     */
    public function create()
    {
        return view('course_tee_defaults.create');
    }

    /**
     * Store a newly created CourseTeeDefault in storage.
     *
     * @param CreateCourseTeeDefaultRequest $request
     *
     * @return Response
     */
    public function store(CreateCourseTeeDefaultRequest $request)
    {
        $input = $request->all();

        $courseTeeDefault = $this->courseTeeDefaultRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/courseTeeDefaults.singular')]));

        return redirect(route('courseTeeDefaults.index'));
    }

    /**
     * Display the specified CourseTeeDefault.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $courseTeeDefault = $this->courseTeeDefaultRepository->find($id);

        if (empty($courseTeeDefault)) {
            Flash::error(__('messages.not_found', ['model' => __('models/courseTeeDefaults.singular')]));

            return redirect(route('courseTeeDefaults.index'));
        }

        return view('course_tee_defaults.show')->with('courseTeeDefault', $courseTeeDefault);
    }

    /**
     * Show the form for editing the specified CourseTeeDefault.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $courseTeeDefault = $this->courseTeeDefaultRepository->find($id);

        if (empty($courseTeeDefault)) {
            Flash::error(__('messages.not_found', ['model' => __('models/courseTeeDefaults.singular')]));

            return redirect(route('courseTeeDefaults.index'));
        }

        return view('course_tee_defaults.edit')->with('courseTeeDefault', $courseTeeDefault);
    }

    /**
     * Update the specified CourseTeeDefault in storage.
     *
     * @param int $id
     * @param UpdateCourseTeeDefaultRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCourseTeeDefaultRequest $request)
    {
        $courseTeeDefault = $this->courseTeeDefaultRepository->find($id);

        if (empty($courseTeeDefault)) {
            Flash::error(__('messages.not_found', ['model' => __('models/courseTeeDefaults.singular')]));

            return redirect(route('courseTeeDefaults.index'));
        }

        $courseTeeDefault = $this->courseTeeDefaultRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/courseTeeDefaults.singular')]));

        return redirect(route('courseTeeDefaults.index'));
    }

    /**
     * Remove the specified CourseTeeDefault from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $courseTeeDefault = $this->courseTeeDefaultRepository->find($id);

        if (empty($courseTeeDefault)) {
            Flash::error(__('messages.not_found', ['model' => __('models/courseTeeDefaults.singular')]));

            return redirect(route('courseTeeDefaults.index'));
        }

        $this->courseTeeDefaultRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/courseTeeDefaults.singular')]));

        return redirect(route('courseTeeDefaults.index'));
    }
}
