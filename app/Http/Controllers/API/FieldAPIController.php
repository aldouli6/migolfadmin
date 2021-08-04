<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFieldAPIRequest;
use App\Http\Requests\API\UpdateFieldAPIRequest;
use App\Models\Field;
use App\Repositories\FieldRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FieldController
 * @package App\Http\Controllers\API
 */

class FieldAPIController extends AppBaseController
{
    /** @var  FieldRepository */
    private $fieldRepository;

    public function __construct(FieldRepository $fieldRepo)
    {
        $this->fieldRepository = $fieldRepo;
    }

    /**
     * Display a listing of the Field.
     * GET|HEAD /fields
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $fields = $this->fieldRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $fields->toArray(),
            __('messages.retrieved', ['model' => __('models/fields.plural')])
        );
    }

    /**
     * Store a newly created Field in storage.
     * POST /fields
     *
     * @param CreateFieldAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFieldAPIRequest $request)
    {
        $input = $request->all();

        $field = $this->fieldRepository->create($input);

        return $this->sendResponse(
            $field->toArray(),
            __('messages.saved', ['model' => __('models/fields.singular')])
        );
    }

    /**
     * Display the specified Field.
     * GET|HEAD /fields/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Field $field */
        $field = $this->fieldRepository->find($id);

        if (empty($field)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/fields.singular')])
            );
        }

        return $this->sendResponse(
            $field->toArray(),
            __('messages.retrieved', ['model' => __('models/fields.singular')])
        );
    }

    /**
     * Update the specified Field in storage.
     * PUT/PATCH /fields/{id}
     *
     * @param int $id
     * @param UpdateFieldAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFieldAPIRequest $request)
    {
        $input = $request->all();

        /** @var Field $field */
        $field = $this->fieldRepository->find($id);

        if (empty($field)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/fields.singular')])
            );
        }

        $field = $this->fieldRepository->update($input, $id);

        return $this->sendResponse(
            $field->toArray(),
            __('messages.updated', ['model' => __('models/fields.singular')])
        );
    }

    /**
     * Remove the specified Field from storage.
     * DELETE /fields/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Field $field */
        $field = $this->fieldRepository->find($id);

        if (empty($field)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/fields.singular')])
            );
        }

        $field->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/fields.singular')])
        );
    }
}
