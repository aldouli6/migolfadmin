<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeeColorRequest;
use App\Http\Requests\UpdateTeeColorRequest;
use App\Repositories\TeeColorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TeeColorController extends AppBaseController
{
    /** @var  TeeColorRepository */
    private $teeColorRepository;

    public function __construct(TeeColorRepository $teeColorRepo)
    {
        $this->teeColorRepository = $teeColorRepo;
    }

    /**
     * Display a listing of the TeeColor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $teeColors = $this->teeColorRepository->all();

        return view('tee_colors.index')
            ->with('teeColors', $teeColors);
    }

    /**
     * Show the form for creating a new TeeColor.
     *
     * @return Response
     */
    public function create()
    {
        return view('tee_colors.create');
    }

    /**
     * Store a newly created TeeColor in storage.
     *
     * @param CreateTeeColorRequest $request
     *
     * @return Response
     */
    public function store(CreateTeeColorRequest $request)
    {
        $input = $request->all();

        $teeColor = $this->teeColorRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/teeColors.singular')]));

        return redirect(route('teeColors.index'));
    }

    /**
     * Display the specified TeeColor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $teeColor = $this->teeColorRepository->find($id);

        if (empty($teeColor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/teeColors.singular')]));

            return redirect(route('teeColors.index'));
        }

        return view('tee_colors.show')->with('teeColor', $teeColor);
    }

    /**
     * Show the form for editing the specified TeeColor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $teeColor = $this->teeColorRepository->find($id);

        if (empty($teeColor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/teeColors.singular')]));

            return redirect(route('teeColors.index'));
        }

        return view('tee_colors.edit')->with('teeColor', $teeColor);
    }

    /**
     * Update the specified TeeColor in storage.
     *
     * @param int $id
     * @param UpdateTeeColorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeeColorRequest $request)
    {
        $teeColor = $this->teeColorRepository->find($id);

        if (empty($teeColor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/teeColors.singular')]));

            return redirect(route('teeColors.index'));
        }

        $teeColor = $this->teeColorRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/teeColors.singular')]));

        return redirect(route('teeColors.index'));
    }

    /**
     * Remove the specified TeeColor from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $teeColor = $this->teeColorRepository->find($id);

        if (empty($teeColor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/teeColors.singular')]));

            return redirect(route('teeColors.index'));
        }

        $this->teeColorRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/teeColors.singular')]));

        return redirect(route('teeColors.index'));
    }
}
