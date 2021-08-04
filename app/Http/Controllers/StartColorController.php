<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStartColorRequest;
use App\Http\Requests\UpdateStartColorRequest;
use App\Repositories\StartColorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class StartColorController extends AppBaseController
{
    /** @var  StartColorRepository */
    private $startColorRepository;

    public function __construct(StartColorRepository $startColorRepo)
    {
        $this->startColorRepository = $startColorRepo;
    }

    /**
     * Display a listing of the StartColor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $startColors = $this->startColorRepository->all();

        return view('start_colors.index')
            ->with('startColors', $startColors);
    }

    /**
     * Show the form for creating a new StartColor.
     *
     * @return Response
     */
    public function create()
    {
        return view('start_colors.create');
    }

    /**
     * Store a newly created StartColor in storage.
     *
     * @param CreateStartColorRequest $request
     *
     * @return Response
     */
    public function store(CreateStartColorRequest $request)
    {
        $input = $request->all();

        $startColor = $this->startColorRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/startColors.singular')]));

        return redirect(route('startColors.index'));
    }

    /**
     * Display the specified StartColor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $startColor = $this->startColorRepository->find($id);

        if (empty($startColor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/startColors.singular')]));

            return redirect(route('startColors.index'));
        }

        return view('start_colors.show')->with('startColor', $startColor);
    }

    /**
     * Show the form for editing the specified StartColor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $startColor = $this->startColorRepository->find($id);

        if (empty($startColor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/startColors.singular')]));

            return redirect(route('startColors.index'));
        }

        return view('start_colors.edit')->with('startColor', $startColor);
    }

    /**
     * Update the specified StartColor in storage.
     *
     * @param int $id
     * @param UpdateStartColorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStartColorRequest $request)
    {
        $startColor = $this->startColorRepository->find($id);

        if (empty($startColor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/startColors.singular')]));

            return redirect(route('startColors.index'));
        }

        $startColor = $this->startColorRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/startColors.singular')]));

        return redirect(route('startColors.index'));
    }

    /**
     * Remove the specified StartColor from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $startColor = $this->startColorRepository->find($id);

        if (empty($startColor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/startColors.singular')]));

            return redirect(route('startColors.index'));
        }

        $this->startColorRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/startColors.singular')]));

        return redirect(route('startColors.index'));
    }
}
