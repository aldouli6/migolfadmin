<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTeeAPIRequest;
use App\Http\Requests\API\UpdateTeeAPIRequest;
use App\Models\Tee;
use App\Repositories\TeeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TeeController
 * @package App\Http\Controllers\API
 */

class TeeAPIController extends AppBaseController
{
    /** @var  TeeRepository */
    private $teeRepository;

    public function __construct(TeeRepository $teeRepo)
    {
        $this->teeRepository = $teeRepo;
    }

    /**
     * Display a listing of the Tee.
     * GET|HEAD /tees
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tees = $this->teeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        foreach ($tees as $tee) {
            $tee['teecolor'] =Tee::find($tee['teecolor_id'])->tee_color; 
        }
        return $this->sendResponse(
            $tees->toArray(),
            __('messages.retrieved', ['model' => __('models/tees.plural')])
        );
    }

    /**
     * Store a newly created Tee in storage.
     * POST /tees
     *
     * @param CreateTeeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTeeAPIRequest $request)
    {
        $input = $request->all();

        $tee = $this->teeRepository->create($input);

        return $this->sendResponse(
            $tee->toArray(),
            __('messages.saved', ['model' => __('models/tees.singular')])
        );
    }

    /**
     * Display the specified Tee.
     * GET|HEAD /tees/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tee $tee */
        $tee = $this->teeRepository->find($id);
        if (empty($tee)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/tees.singular')])
            );
        }

        return $this->sendResponse(
            $tee->toArray(),
            __('messages.retrieved', ['model' => __('models/tees.singular')])
        );
    }

    /**
     * Update the specified Tee in storage.
     * PUT/PATCH /tees/{id}
     *
     * @param int $id
     * @param UpdateTeeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tee $tee */
        $tee = $this->teeRepository->find($id);

        if (empty($tee)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/tees.singular')])
            );
        }

        $tee = $this->teeRepository->update($input, $id);

        return $this->sendResponse(
            $tee->toArray(),
            __('messages.updated', ['model' => __('models/tees.singular')])
        );
    }

    /**
     * Remove the specified Tee from storage.
     * DELETE /tees/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Tee $tee */
        $tee = $this->teeRepository->find($id);

        if (empty($tee)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/tees.singular')])
            );
        }

        $tee->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/tees.singular')])
        );
    }
}
