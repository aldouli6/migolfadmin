<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBetMedalPlayRequest;
use App\Http\Requests\UpdateBetMedalPlayRequest;
use App\Repositories\BetMedalPlayRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BetMedalPlayController extends AppBaseController
{
    /** @var  BetMedalPlayRepository */
    private $betMedalPlayRepository;

    public function __construct(BetMedalPlayRepository $betMedalPlayRepo)
    {
        $this->betMedalPlayRepository = $betMedalPlayRepo;
    }

    /**
     * Display a listing of the BetMedalPlay.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $betMedalPlays = $this->betMedalPlayRepository->all();

        return view('bet_medal_plays.index')
            ->with('betMedalPlays', $betMedalPlays);
    }

    /**
     * Show the form for creating a new BetMedalPlay.
     *
     * @return Response
     */
    public function create()
    {
        return view('bet_medal_plays.create');
    }

    /**
     * Store a newly created BetMedalPlay in storage.
     *
     * @param CreateBetMedalPlayRequest $request
     *
     * @return Response
     */
    public function store(CreateBetMedalPlayRequest $request)
    {
        $input = $request->all();

        $betMedalPlay = $this->betMedalPlayRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/betMedalPlays.singular')]));

        return redirect(route('betMedalPlays.index'));
    }

    /**
     * Display the specified BetMedalPlay.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $betMedalPlay = $this->betMedalPlayRepository->find($id);

        if (empty($betMedalPlay)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betMedalPlays.singular')]));

            return redirect(route('betMedalPlays.index'));
        }

        return view('bet_medal_plays.show')->with('betMedalPlay', $betMedalPlay);
    }

    /**
     * Show the form for editing the specified BetMedalPlay.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $betMedalPlay = $this->betMedalPlayRepository->find($id);

        if (empty($betMedalPlay)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betMedalPlays.singular')]));

            return redirect(route('betMedalPlays.index'));
        }

        return view('bet_medal_plays.edit')->with('betMedalPlay', $betMedalPlay);
    }

    /**
     * Update the specified BetMedalPlay in storage.
     *
     * @param int $id
     * @param UpdateBetMedalPlayRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBetMedalPlayRequest $request)
    {
        $betMedalPlay = $this->betMedalPlayRepository->find($id);

        if (empty($betMedalPlay)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betMedalPlays.singular')]));

            return redirect(route('betMedalPlays.index'));
        }

        $betMedalPlay = $this->betMedalPlayRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/betMedalPlays.singular')]));

        return redirect(route('betMedalPlays.index'));
    }

    /**
     * Remove the specified BetMedalPlay from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $betMedalPlay = $this->betMedalPlayRepository->find($id);

        if (empty($betMedalPlay)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betMedalPlays.singular')]));

            return redirect(route('betMedalPlays.index'));
        }

        $this->betMedalPlayRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/betMedalPlays.singular')]));

        return redirect(route('betMedalPlays.index'));
    }
}
