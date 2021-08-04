<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStartRequest;
use App\Http\Requests\UpdateStartRequest;
use App\Repositories\StartRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class StartController extends AppBaseController
{
    /** @var  StartRepository */
    private $startRepository;

    public function __construct(StartRepository $startRepo)
    {
        $this->startRepository = $startRepo;
    }

    /**
     * Display a listing of the Start.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $starts = $this->startRepository->all();

        return view('starts.index')
            ->with('starts', $starts);
    }

    /**
     * Show the form for creating a new Start.
     *
     * @return Response
     */
    public function create()
    {
        return view('starts.create');
    }

    /**
     * Store a newly created Start in storage.
     *
     * @param CreateStartRequest $request
     *
     * @return Response
     */
    public function store(CreateStartRequest $request)
    {
        $input = $request->all();

        $start = $this->startRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/starts.singular')]));

        return redirect(route('starts.index'));
    }

    /**
     * Display the specified Start.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $start = $this->startRepository->find($id);

        if (empty($start)) {
            Flash::error(__('messages.not_found', ['model' => __('models/starts.singular')]));

            return redirect(route('starts.index'));
        }

        return view('starts.show')->with('start', $start);
    }

    /**
     * Show the form for editing the specified Start.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $start = $this->startRepository->find($id);

        if (empty($start)) {
            Flash::error(__('messages.not_found', ['model' => __('models/starts.singular')]));

            return redirect(route('starts.index'));
        }

        return view('starts.edit')->with('start', $start);
    }

    /**
     * Update the specified Start in storage.
     *
     * @param int $id
     * @param UpdateStartRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStartRequest $request)
    {
        $start = $this->startRepository->find($id);

        if (empty($start)) {
            Flash::error(__('messages.not_found', ['model' => __('models/starts.singular')]));

            return redirect(route('starts.index'));
        }

        $start = $this->startRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/starts.singular')]));

        return redirect(route('starts.index'));
    }

    /**
     * Remove the specified Start from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $start = $this->startRepository->find($id);

        if (empty($start)) {
            Flash::error(__('messages.not_found', ['model' => __('models/starts.singular')]));

            return redirect(route('starts.index'));
        }

        $this->startRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/starts.singular')]));

        return redirect(route('starts.index'));
    }
}
