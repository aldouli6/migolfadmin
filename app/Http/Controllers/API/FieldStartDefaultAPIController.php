<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFieldStartDefaultAPIRequest;
use App\Http\Requests\API\UpdateFieldStartDefaultAPIRequest;
use App\Models\FieldStartDefault;
use App\Repositories\FieldStartDefaultRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FieldStartDefaultController
 * @package App\Http\Controllers\API
 */

class FieldStartDefaultAPIController extends AppBaseController
{
    /** @var  FieldStartDefaultRepository */
    private $fieldStartDefaultRepository;

    public function __construct(FieldStartDefaultRepository $fieldStartDefaultRepo)
    {
        $this->fieldStartDefaultRepository = $fieldStartDefaultRepo;
    }

    /**
     * Display a listing of the FieldStartDefault.
     * GET|HEAD /fieldStartDefaults
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $fieldStartDefaults = $this->fieldStartDefaultRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $fieldStartDefaults->toArray(),
            __('messages.retrieved', ['model' => __('models/fieldStartDefaults.plural')])
        );
    }

    /**
     * Store a newly created FieldStartDefault in storage.
     * POST /fieldStartDefaults
     *
     * @param CreateFieldStartDefaultAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFieldStartDefaultAPIRequest $request)
    {
        $input = $request->all();

        $fieldStartDefault = $this->fieldStartDefaultRepository->create($input);

        return $this->sendResponse(
            $fieldStartDefault->toArray(),
            __('messages.saved', ['model' => __('models/fieldStartDefaults.singular')])
        );
    }

    /**
     * Display the specified FieldStartDefault.
     * GET|HEAD /fieldStartDefaults/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FieldStartDefault $fieldStartDefault */
        $fieldStartDefault = $this->fieldStartDefaultRepository->find($id);

        if (empty($fieldStartDefault)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/fieldStartDefaults.singular')])
            );
        }

        return $this->sendResponse(
            $fieldStartDefault->toArray(),
            __('messages.retrieved', ['model' => __('models/fieldStartDefaults.singular')])
        );
    }

    /**
     * Update the specified FieldStartDefault in storage.
     * PUT/PATCH /fieldStartDefaults/{id}
     *
     * @param int $id
     * @param UpdateFieldStartDefaultAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFieldStartDefaultAPIRequest $request)
    {
        $input = $request->all();

        /** @var FieldStartDefault $fieldStartDefault */
        $fieldStartDefault = $this->fieldStartDefaultRepository->find($id);

        if (empty($fieldStartDefault)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/fieldStartDefaults.singular')])
            );
        }

        $fieldStartDefault = $this->fieldStartDefaultRepository->update($input, $id);

        return $this->sendResponse(
            $fieldStartDefault->toArray(),
            __('messages.updated', ['model' => __('models/fieldStartDefaults.singular')])
        );
    }

    /**
     * Remove the specified FieldStartDefault from storage.
     * DELETE /fieldStartDefaults/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var FieldStartDefault $fieldStartDefault */
        $fieldStartDefault = $this->fieldStartDefaultRepository->find($id);

        if (empty($fieldStartDefault)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/fieldStartDefaults.singular')])
            );
        }

        $fieldStartDefault->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/fieldStartDefaults.singular')])
        );
    }
}
