<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBetRequest;
use App\Http\Requests\UpdateBetRequest;
use App\Repositories\BetRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Bet;
use Flash;
use Response;

class BetController extends AppBaseController
{
    /** @var  BetRepository */
    private $betRepository;

    public function __construct(BetRepository $betRepo)
    {
        $this->betRepository = $betRepo;
    }

    /**
     * Display a listing of the Bet.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $bets = $this->betRepository->all();

        return view('bets.index')
            ->with('bets', $bets);
    }

    /**
     * Show the form for creating a new Bet.
     *
     * @return Response
     */
    public function create()
    {
        return view('bets.create');
    }

    /**
     * Store a newly created Bet in storage.
     *
     * @param CreateBetRequest $request
     *
     * @return Response
     */
    public function store(CreateBetRequest $request)
    {
        $input = $request->all();

        $bet = $this->betRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/bets.singular')]));

        return redirect(route('bets.index'));
    }

    /**
     * Display the specified Bet.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bet = $this->betRepository->find($id);

        if (empty($bet)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bets.singular')]));

            return redirect(route('bets.index'));
        }

        return view('bets.show')->with('bet', $bet);
    }

    /**
     * Show the form for editing the specified Bet.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bet = $this->betRepository->find($id);

        if (empty($bet)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bets.singular')]));

            return redirect(route('bets.index'));
        }

        return view('bets.edit')->with('bet', $bet);
    }

    /**
     * Update the specified Bet in storage.
     *
     * @param int $id
     * @param UpdateBetRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBetRequest $request)
    {
        $bet = $this->betRepository->find($id);

        if (empty($bet)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bets.singular')]));

            return redirect(route('bets.index'));
        }

        $bet = $this->betRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/bets.singular')]));

        return redirect(route('bets.index'));
    }

    /**
     * Remove the specified Bet from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bet = $this->betRepository->find($id);

        if (empty($bet)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bets.singular')]));

            return redirect(route('bets.index'));
        }

        $this->betRepository->delete($id);
        $BET = Bet::onlyTrashed()->find($id)->forceDelete();
        Flash::success(__('messages.deleted', ['model' => __('models/bets.singular')]));

        return redirect(route('bets.index'));
    }
}
