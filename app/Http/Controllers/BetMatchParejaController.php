<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBetMatchParejaRequest;
use App\Http\Requests\UpdateBetMatchParejaRequest;
use App\Repositories\BetMatchParejaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BetMatchParejaController extends AppBaseController
{
    /** @var  BetMatchParejaRepository */
    private $betMatchParejaRepository;

    public function __construct(BetMatchParejaRepository $betMatchParejaRepo)
    {
        $this->betMatchParejaRepository = $betMatchParejaRepo;
    }

    /**
     * Display a listing of the BetMatchPareja.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $betMatchParejas = $this->betMatchParejaRepository->all();

        return view('bet_match_parejas.index')
            ->with('betMatchParejas', $betMatchParejas);
    }

    /**
     * Show the form for creating a new BetMatchPareja.
     *
     * @return Response
     */
    public function create()
    {
        return view('bet_match_parejas.create');
    }

    /**
     * Store a newly created BetMatchPareja in storage.
     *
     * @param CreateBetMatchParejaRequest $request
     *
     * @return Response
     */
    public function store(CreateBetMatchParejaRequest $request)
    {
        $input = $request->all();

        $betMatchPareja = $this->betMatchParejaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/betMatchParejas.singular')]));

        return redirect(route('betMatchParejas.index'));
    }

    /**
     * Display the specified BetMatchPareja.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $betMatchPareja = $this->betMatchParejaRepository->find($id);

        if (empty($betMatchPareja)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betMatchParejas.singular')]));

            return redirect(route('betMatchParejas.index'));
        }

        return view('bet_match_parejas.show')->with('betMatchPareja', $betMatchPareja);
    }

    /**
     * Show the form for editing the specified BetMatchPareja.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $betMatchPareja = $this->betMatchParejaRepository->find($id);

        if (empty($betMatchPareja)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betMatchParejas.singular')]));

            return redirect(route('betMatchParejas.index'));
        }

        return view('bet_match_parejas.edit')->with('betMatchPareja', $betMatchPareja);
    }

    /**
     * Update the specified BetMatchPareja in storage.
     *
     * @param int $id
     * @param UpdateBetMatchParejaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBetMatchParejaRequest $request)
    {
        $betMatchPareja = $this->betMatchParejaRepository->find($id);

        if (empty($betMatchPareja)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betMatchParejas.singular')]));

            return redirect(route('betMatchParejas.index'));
        }

        $betMatchPareja = $this->betMatchParejaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/betMatchParejas.singular')]));

        return redirect(route('betMatchParejas.index'));
    }

    /**
     * Remove the specified BetMatchPareja from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $betMatchPareja = $this->betMatchParejaRepository->find($id);

        if (empty($betMatchPareja)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betMatchParejas.singular')]));

            return redirect(route('betMatchParejas.index'));
        }

        $this->betMatchParejaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/betMatchParejas.singular')]));

        return redirect(route('betMatchParejas.index'));
    }
}
