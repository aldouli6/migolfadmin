<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBetRompeHandicapRequest;
use App\Http\Requests\UpdateBetRompeHandicapRequest;
use App\Repositories\BetRompeHandicapRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BetRompeHandicapController extends AppBaseController
{
    /** @var  BetRompeHandicapRepository */
    private $betRompeHandicapRepository;

    public function __construct(BetRompeHandicapRepository $betRompeHandicapRepo)
    {
        $this->betRompeHandicapRepository = $betRompeHandicapRepo;
    }

    /**
     * Display a listing of the BetRompeHandicap.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $betRompeHandicaps = $this->betRompeHandicapRepository->all();

        return view('bet_rompe_handicaps.index')
            ->with('betRompeHandicaps', $betRompeHandicaps);
    }

    /**
     * Show the form for creating a new BetRompeHandicap.
     *
     * @return Response
     */
    public function create()
    {
        return view('bet_rompe_handicaps.create');
    }

    /**
     * Store a newly created BetRompeHandicap in storage.
     *
     * @param CreateBetRompeHandicapRequest $request
     *
     * @return Response
     */
    public function store(CreateBetRompeHandicapRequest $request)
    {
        $input = $request->all();

        $betRompeHandicap = $this->betRompeHandicapRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/betRompeHandicaps.singular')]));

        return redirect(route('betRompeHandicaps.index'));
    }

    /**
     * Display the specified BetRompeHandicap.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $betRompeHandicap = $this->betRompeHandicapRepository->find($id);

        if (empty($betRompeHandicap)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betRompeHandicaps.singular')]));

            return redirect(route('betRompeHandicaps.index'));
        }

        return view('bet_rompe_handicaps.show')->with('betRompeHandicap', $betRompeHandicap);
    }

    /**
     * Show the form for editing the specified BetRompeHandicap.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $betRompeHandicap = $this->betRompeHandicapRepository->find($id);

        if (empty($betRompeHandicap)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betRompeHandicaps.singular')]));

            return redirect(route('betRompeHandicaps.index'));
        }

        return view('bet_rompe_handicaps.edit')->with('betRompeHandicap', $betRompeHandicap);
    }

    /**
     * Update the specified BetRompeHandicap in storage.
     *
     * @param int $id
     * @param UpdateBetRompeHandicapRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBetRompeHandicapRequest $request)
    {
        $betRompeHandicap = $this->betRompeHandicapRepository->find($id);

        if (empty($betRompeHandicap)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betRompeHandicaps.singular')]));

            return redirect(route('betRompeHandicaps.index'));
        }

        $betRompeHandicap = $this->betRompeHandicapRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/betRompeHandicaps.singular')]));

        return redirect(route('betRompeHandicaps.index'));
    }

    /**
     * Remove the specified BetRompeHandicap from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $betRompeHandicap = $this->betRompeHandicapRepository->find($id);

        if (empty($betRompeHandicap)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betRompeHandicaps.singular')]));

            return redirect(route('betRompeHandicaps.index'));
        }

        $this->betRompeHandicapRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/betRompeHandicaps.singular')]));

        return redirect(route('betRompeHandicaps.index'));
    }
}
