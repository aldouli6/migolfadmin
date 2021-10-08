<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBetGreenRequest;
use App\Http\Requests\UpdateBetGreenRequest;
use App\Repositories\BetGreenRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BetGreenController extends AppBaseController
{
    /** @var  BetGreenRepository */
    private $betGreenRepository;

    public function __construct(BetGreenRepository $betGreenRepo)
    {
        $this->betGreenRepository = $betGreenRepo;
    }

    /**
     * Display a listing of the BetGreen.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $betGreens = $this->betGreenRepository->all();

        return view('bet_greens.index')
            ->with('betGreens', $betGreens);
    }

    /**
     * Show the form for creating a new BetGreen.
     *
     * @return Response
     */
    public function create()
    {
        return view('bet_greens.create');
    }

    /**
     * Store a newly created BetGreen in storage.
     *
     * @param CreateBetGreenRequest $request
     *
     * @return Response
     */
    public function store(CreateBetGreenRequest $request)
    {
        $input = $request->all();

        $betGreen = $this->betGreenRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/betGreens.singular')]));

        return redirect(route('betGreens.index'));
    }

    /**
     * Display the specified BetGreen.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $betGreen = $this->betGreenRepository->find($id);

        if (empty($betGreen)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betGreens.singular')]));

            return redirect(route('betGreens.index'));
        }

        return view('bet_greens.show')->with('betGreen', $betGreen);
    }

    /**
     * Show the form for editing the specified BetGreen.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $betGreen = $this->betGreenRepository->find($id);

        if (empty($betGreen)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betGreens.singular')]));

            return redirect(route('betGreens.index'));
        }

        return view('bet_greens.edit')->with('betGreen', $betGreen);
    }

    /**
     * Update the specified BetGreen in storage.
     *
     * @param int $id
     * @param UpdateBetGreenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBetGreenRequest $request)
    {
        $betGreen = $this->betGreenRepository->find($id);

        if (empty($betGreen)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betGreens.singular')]));

            return redirect(route('betGreens.index'));
        }

        $betGreen = $this->betGreenRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/betGreens.singular')]));

        return redirect(route('betGreens.index'));
    }

    /**
     * Remove the specified BetGreen from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $betGreen = $this->betGreenRepository->find($id);

        if (empty($betGreen)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betGreens.singular')]));

            return redirect(route('betGreens.index'));
        }

        $this->betGreenRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/betGreens.singular')]));

        return redirect(route('betGreens.index'));
    }
}
