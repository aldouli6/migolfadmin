<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBetMatchIndividualRequest;
use App\Http\Requests\UpdateBetMatchIndividualRequest;
use App\Repositories\BetMatchIndividualRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BetMatchIndividualController extends AppBaseController
{
    /** @var  BetMatchIndividualRepository */
    private $betMatchIndividualRepository;

    public function __construct(BetMatchIndividualRepository $betMatchIndividualRepo)
    {
        $this->betMatchIndividualRepository = $betMatchIndividualRepo;
    }

    /**
     * Display a listing of the BetMatchIndividual.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $betMatchIndividuals = $this->betMatchIndividualRepository->all();

        return view('bet_match_individuals.index')
            ->with('betMatchIndividuals', $betMatchIndividuals);
    }

    /**
     * Show the form for creating a new BetMatchIndividual.
     *
     * @return Response
     */
    public function create()
    {
        return view('bet_match_individuals.create');
    }

    /**
     * Store a newly created BetMatchIndividual in storage.
     *
     * @param CreateBetMatchIndividualRequest $request
     *
     * @return Response
     */
    public function store(CreateBetMatchIndividualRequest $request)
    {
        $input = $request->all();

        $betMatchIndividual = $this->betMatchIndividualRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/betMatchIndividuals.singular')]));

        return redirect(route('betMatchIndividuals.index'));
    }

    /**
     * Display the specified BetMatchIndividual.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $betMatchIndividual = $this->betMatchIndividualRepository->find($id);

        if (empty($betMatchIndividual)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betMatchIndividuals.singular')]));

            return redirect(route('betMatchIndividuals.index'));
        }

        return view('bet_match_individuals.show')->with('betMatchIndividual', $betMatchIndividual);
    }

    /**
     * Show the form for editing the specified BetMatchIndividual.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $betMatchIndividual = $this->betMatchIndividualRepository->find($id);

        if (empty($betMatchIndividual)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betMatchIndividuals.singular')]));

            return redirect(route('betMatchIndividuals.index'));
        }

        return view('bet_match_individuals.edit')->with('betMatchIndividual', $betMatchIndividual);
    }

    /**
     * Update the specified BetMatchIndividual in storage.
     *
     * @param int $id
     * @param UpdateBetMatchIndividualRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBetMatchIndividualRequest $request)
    {
        $betMatchIndividual = $this->betMatchIndividualRepository->find($id);

        if (empty($betMatchIndividual)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betMatchIndividuals.singular')]));

            return redirect(route('betMatchIndividuals.index'));
        }

        $betMatchIndividual = $this->betMatchIndividualRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/betMatchIndividuals.singular')]));

        return redirect(route('betMatchIndividuals.index'));
    }

    /**
     * Remove the specified BetMatchIndividual from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $betMatchIndividual = $this->betMatchIndividualRepository->find($id);

        if (empty($betMatchIndividual)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betMatchIndividuals.singular')]));

            return redirect(route('betMatchIndividuals.index'));
        }

        $this->betMatchIndividualRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/betMatchIndividuals.singular')]));

        return redirect(route('betMatchIndividuals.index'));
    }
}
