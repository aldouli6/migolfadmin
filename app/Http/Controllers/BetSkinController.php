<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBetSkinRequest;
use App\Http\Requests\UpdateBetSkinRequest;
use App\Repositories\BetSkinRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BetSkinController extends AppBaseController
{
    /** @var  BetSkinRepository */
    private $betSkinRepository;

    public function __construct(BetSkinRepository $betSkinRepo)
    {
        $this->betSkinRepository = $betSkinRepo;
    }

    /**
     * Display a listing of the BetSkin.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $betSkins = $this->betSkinRepository->all();

        return view('bet_skins.index')
            ->with('betSkins', $betSkins);
    }

    /**
     * Show the form for creating a new BetSkin.
     *
     * @return Response
     */
    public function create()
    {
        return view('bet_skins.create');
    }

    /**
     * Store a newly created BetSkin in storage.
     *
     * @param CreateBetSkinRequest $request
     *
     * @return Response
     */
    public function store(CreateBetSkinRequest $request)
    {
        $input = $request->all();

        $betSkin = $this->betSkinRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/betSkins.singular')]));

        return redirect(route('betSkins.index'));
    }

    /**
     * Display the specified BetSkin.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $betSkin = $this->betSkinRepository->find($id);

        if (empty($betSkin)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betSkins.singular')]));

            return redirect(route('betSkins.index'));
        }

        return view('bet_skins.show')->with('betSkin', $betSkin);
    }

    /**
     * Show the form for editing the specified BetSkin.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $betSkin = $this->betSkinRepository->find($id);

        if (empty($betSkin)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betSkins.singular')]));

            return redirect(route('betSkins.index'));
        }

        return view('bet_skins.edit')->with('betSkin', $betSkin);
    }

    /**
     * Update the specified BetSkin in storage.
     *
     * @param int $id
     * @param UpdateBetSkinRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBetSkinRequest $request)
    {
        $betSkin = $this->betSkinRepository->find($id);

        if (empty($betSkin)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betSkins.singular')]));

            return redirect(route('betSkins.index'));
        }

        $betSkin = $this->betSkinRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/betSkins.singular')]));

        return redirect(route('betSkins.index'));
    }

    /**
     * Remove the specified BetSkin from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $betSkin = $this->betSkinRepository->find($id);

        if (empty($betSkin)) {
            Flash::error(__('messages.not_found', ['model' => __('models/betSkins.singular')]));

            return redirect(route('betSkins.index'));
        }

        $this->betSkinRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/betSkins.singular')]));

        return redirect(route('betSkins.index'));
    }
}
