<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBetStablefordRequest;
use App\Http\Requests\UpdateBetStablefordRequest;
use App\Repositories\BetStablefordRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BetStablefordController extends AppBaseController
{
    /** @var  BetStablefordRepository */
    private $betStablefordRepository;

    public function __construct(BetStablefordRepository $betStablefordRepo)
    {
        $this->betStablefordRepository = $betStablefordRepo;
    }

    /**
     * Display a listing of the BetStableford.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $betStablefords = $this->betStablefordRepository->all();

        return view('bet_stablefords.index')
            ->with('betStablefords', $betStablefords);
    }

    /**
     * Show the form for creating a new BetStableford.
     *
     * @return Response
     */
    public function create()
    {
        return view('bet_stablefords.create');
    }

    /**
     * Store a newly created BetStableford in storage.
     *
     * @param CreateBetStablefordRequest $request
     *
     * @return Response
     */
    public function store(CreateBetStablefordRequest $request)
    {
        $input = $request->all();

        $betStableford = $this->betStablefordRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/betStablefords.singular')]));

        return redirect(route('betStablefords.index'));
    }

    /**
     * Display the specified BetStableford.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $betStableford = $this->betStablefordRepository->find($id);

        if (empty($betStableford)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betStablefords.singular')]));

            return redirect(route('betStablefords.index'));
        }

        return view('bet_stablefords.show')->with('betStableford', $betStableford);
    }

    /**
     * Show the form for editing the specified BetStableford.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $betStableford = $this->betStablefordRepository->find($id);

        if (empty($betStableford)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betStablefords.singular')]));

            return redirect(route('betStablefords.index'));
        }

        return view('bet_stablefords.edit')->with('betStableford', $betStableford);
    }

    /**
     * Update the specified BetStableford in storage.
     *
     * @param int $id
     * @param UpdateBetStablefordRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBetStablefordRequest $request)
    {
        $betStableford = $this->betStablefordRepository->find($id);

        if (empty($betStableford)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betStablefords.singular')]));

            return redirect(route('betStablefords.index'));
        }

        $betStableford = $this->betStablefordRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/betStablefords.singular')]));

        return redirect(route('betStablefords.index'));
    }

    /**
     * Remove the specified BetStableford from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $betStableford = $this->betStablefordRepository->find($id);

        if (empty($betStableford)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betStablefords.singular')]));

            return redirect(route('betStablefords.index'));
        }

        $this->betStablefordRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/betStablefords.singular')]));

        return redirect(route('betStablefords.index'));
    }
}
