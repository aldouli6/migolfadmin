<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeeRequest;
use App\Http\Requests\UpdateTeeRequest;
use App\Repositories\TeeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TeeController extends AppBaseController
{
    /** @var  TeeRepository */
    private $teeRepository;

    public function __construct(TeeRepository $teeRepo)
    {
        $this->teeRepository = $teeRepo;
    }

    /**
     * Display a listing of the Tee.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tees = $this->teeRepository->all();

        return view('tees.index')
            ->with('tees', $tees);
    }

    /**
     * Show the form for creating a new Tee.
     *
     * @return Response
     */
    public function create()
    {
        return view('tees.create');
    }

    /**
     * Store a newly created Tee in storage.
     *
     * @param CreateTeeRequest $request
     *
     * @return Response
     */
    public function store(CreateTeeRequest $request)
    {
        $input = $request->all();

        $tee = $this->teeRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tees.singular')]));

        return redirect(route('tees.index'));
    }

    /**
     * Display the specified Tee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tee = $this->teeRepository->find($id);

        if (empty($tee)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tees.singular')]));

            return redirect(route('tees.index'));
        }

        return view('tees.show')->with('tee', $tee);
    }

    /**
     * Show the form for editing the specified Tee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tee = $this->teeRepository->find($id);

        if (empty($tee)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tees.singular')]));

            return redirect(route('tees.index'));
        }

        return view('tees.edit')->with('tee', $tee);
    }

    /**
     * Update the specified Tee in storage.
     *
     * @param int $id
     * @param UpdateTeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeeRequest $request)
    {
        $tee = $this->teeRepository->find($id);

        if (empty($tee)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tees.singular')]));

            return redirect(route('tees.index'));
        }

        $tee = $this->teeRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tees.singular')]));

        return redirect(route('tees.index'));
    }

    /**
     * Remove the specified Tee from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tee = $this->teeRepository->find($id);

        if (empty($tee)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tees.singular')]));

            return redirect(route('tees.index'));
        }

        $this->teeRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tees.singular')]));

        return redirect(route('tees.index'));
    }
}
