<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserFieldRequest;
use App\Http\Requests\UpdateUserFieldRequest;
use App\Repositories\UserFieldRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class UserFieldController extends AppBaseController
{
    /** @var  UserFieldRepository */
    private $userFieldRepository;

    public function __construct(UserFieldRepository $userFieldRepo)
    {
        $this->userFieldRepository = $userFieldRepo;
    }

    /**
     * Display a listing of the UserField.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $userFields = $this->userFieldRepository->all();

        return view('user_fields.index')
            ->with('userFields', $userFields);
    }

    /**
     * Show the form for creating a new UserField.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_fields.create');
    }

    /**
     * Store a newly created UserField in storage.
     *
     * @param CreateUserFieldRequest $request
     *
     * @return Response
     */
    public function store(CreateUserFieldRequest $request)
    {
        $input = $request->all();

        $userField = $this->userFieldRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/userFields.singular')]));

        return redirect(route('userFields.index'));
    }

    /**
     * Display the specified UserField.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userField = $this->userFieldRepository->find($id);

        if (empty($userField)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userFields.singular')]));

            return redirect(route('userFields.index'));
        }

        return view('user_fields.show')->with('userField', $userField);
    }

    /**
     * Show the form for editing the specified UserField.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userField = $this->userFieldRepository->find($id);

        if (empty($userField)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userFields.singular')]));

            return redirect(route('userFields.index'));
        }

        return view('user_fields.edit')->with('userField', $userField);
    }

    /**
     * Update the specified UserField in storage.
     *
     * @param int $id
     * @param UpdateUserFieldRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserFieldRequest $request)
    {
        $userField = $this->userFieldRepository->find($id);

        if (empty($userField)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userFields.singular')]));

            return redirect(route('userFields.index'));
        }

        $userField = $this->userFieldRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/userFields.singular')]));

        return redirect(route('userFields.index'));
    }

    /**
     * Remove the specified UserField from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userField = $this->userFieldRepository->find($id);

        if (empty($userField)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userFields.singular')]));

            return redirect(route('userFields.index'));
        }

        $this->userFieldRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/userFields.singular')]));

        return redirect(route('userFields.index'));
    }
}
