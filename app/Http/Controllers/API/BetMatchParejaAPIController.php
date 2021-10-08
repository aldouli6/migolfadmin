<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBetMatchParejaAPIRequest;
use App\Http\Requests\API\UpdateBetMatchParejaAPIRequest;
use App\Models\BetMatchPareja;
use App\Repositories\BetMatchParejaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BetMatchParejaController
 * @package App\Http\Controllers\API
 */

class BetMatchParejaAPIController extends AppBaseController
{
    /** @var  BetMatchParejaRepository */
    private $betMatchParejaRepository;

    public function __construct(BetMatchParejaRepository $betMatchParejaRepo)
    {
        $this->betMatchParejaRepository = $betMatchParejaRepo;
    }

    /**
     * Display a listing of the BetMatchPareja.
     * GET|HEAD /betMatchParejas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $betMatchParejas = $this->betMatchParejaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $betMatchParejas->toArray(),
            __('messages.retrieved', ['model' => __('models/betMatchParejas.plural')])
        );
    }

    /**
     * Store a newly created BetMatchPareja in storage.
     * POST /betMatchParejas
     *
     * @param CreateBetMatchParejaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBetMatchParejaAPIRequest $request)
    {
        $input = $request->all();

        $betMatchPareja = $this->betMatchParejaRepository->create($input);

        return $this->sendResponse(
            $betMatchPareja->toArray(),
            __('messages.saved', ['model' => __('models/betMatchParejas.singular')])
        );
    }

    /**
     * Display the specified BetMatchPareja.
     * GET|HEAD /betMatchParejas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BetMatchPareja $betMatchPareja */
        $betMatchPareja = $this->betMatchParejaRepository->find($id);

        if (empty($betMatchPareja)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betMatchParejas.singular')])
            );
        }

        return $this->sendResponse(
            $betMatchPareja->toArray(),
            __('messages.retrieved', ['model' => __('models/betMatchParejas.singular')])
        );
    }

    /**
     * Update the specified BetMatchPareja in storage.
     * PUT/PATCH /betMatchParejas/{id}
     *
     * @param int $id
     * @param UpdateBetMatchParejaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBetMatchParejaAPIRequest $request)
    {
        $input = $request->all();

        /** @var BetMatchPareja $betMatchPareja */
        $betMatchPareja = $this->betMatchParejaRepository->find($id);

        if (empty($betMatchPareja)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betMatchParejas.singular')])
            );
        }

        $betMatchPareja = $this->betMatchParejaRepository->update($input, $id);

        return $this->sendResponse(
            $betMatchPareja->toArray(),
            __('messages.updated', ['model' => __('models/betMatchParejas.singular')])
        );
    }

    /**
     * Remove the specified BetMatchPareja from storage.
     * DELETE /betMatchParejas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BetMatchPareja $betMatchPareja */
        $betMatchPareja = $this->betMatchParejaRepository->find($id);

        if (empty($betMatchPareja)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/betMatchParejas.singular')])
            );
        }

        $betMatchPareja->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/betMatchParejas.singular')])
        );
    }
}
