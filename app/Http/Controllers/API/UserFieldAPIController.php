<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserFieldAPIRequest;
use App\Http\Requests\API\UpdateUserFieldAPIRequest;
use App\Models\UserField;
use App\Repositories\UserFieldRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UserFieldController
 * @package App\Http\Controllers\API
 */

class UserFieldAPIController extends AppBaseController
{
    /** @var  UserFieldRepository */
    private $userFieldRepository;

    public function __construct(UserFieldRepository $userFieldRepo)
    {
        $this->userFieldRepository = $userFieldRepo;
    }

    /**
     * Display a listing of the UserField.
     * GET|HEAD /userFields
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $userFields = $this->userFieldRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $userFields->toArray(),
            __('messages.retrieved', ['model' => __('models/userFields.plural')])
        );
    }

    /**
     * Store a newly created UserField in storage.
     * POST /userFields
     *
     * @param CreateUserFieldAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserFieldAPIRequest $request)
    {
        $input = $request->all();

        $userField = $this->userFieldRepository->create($input);

        return $this->sendResponse(
            $userField->toArray(),
            __('messages.saved', ['model' => __('models/userFields.singular')])
        );
    }

    /**
     * Display the specified UserField.
     * GET|HEAD /userFields/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UserField $userField */
        $userField = $this->userFieldRepository->find($id);

        if (empty($userField)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userFields.singular')])
            );
        }

        return $this->sendResponse(
            $userField->toArray(),
            __('messages.retrieved', ['model' => __('models/userFields.singular')])
        );
    }

    /**
     * Update the specified UserField in storage.
     * PUT/PATCH /userFields/{id}
     *
     * @param int $id
     * @param UpdateUserFieldAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserFieldAPIRequest $request)
    {
        $input = $request->all();

        /** @var UserField $userField */
        $userField = $this->userFieldRepository->find($id);

        if (empty($userField)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userFields.singular')])
            );
        }

        $userField = $this->userFieldRepository->update($input, $id);

        return $this->sendResponse(
            $userField->toArray(),
            __('messages.updated', ['model' => __('models/userFields.singular')])
        );
    }

    /**
     * Remove the specified UserField from storage.
     * DELETE /userFields/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UserField $userField */
        $userField = $this->userFieldRepository->find($id);

        if (empty($userField)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userFields.singular')])
            );
        }

        $userField->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/userFields.singular')])
        );
    }
}
