<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFieldRequest;
use App\Http\Requests\UpdateFieldRequest;
use App\Repositories\FieldRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FieldController extends AppBaseController
{
    /** @var  FieldRepository */
    private $fieldRepository;

    public function __construct(FieldRepository $fieldRepo)
    {
        $this->fieldRepository = $fieldRepo;
    }

    /**
     * Display a listing of the Field.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $fields = $this->fieldRepository->all();

        return view('fields.index')
            ->with('fields', $fields);
    }

    /**
     * Show the form for creating a new Field.
     *
     * @return Response
     */
    public function create()
    {
        return view('fields.create');
    }

    /**
     * Store a newly created Field in storage.
     *
     * @param CreateFieldRequest $request
     *
     * @return Response
     */
    public function store(CreateFieldRequest $request)
    {
        $input = $request->all();

        $field = $this->fieldRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/fields.singular')]));

        return redirect(route('fields.index'));
    }

    /**
     * Display the specified Field.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $field = $this->fieldRepository->find($id);

        if (empty($field)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fields.singular')]));

            return redirect(route('fields.index'));
        }

        return view('fields.show')->with('field', $field);
    }

    /**
     * Show the form for editing the specified Field.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $field = $this->fieldRepository->find($id);

        if (empty($field)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fields.singular')]));

            return redirect(route('fields.index'));
        }

        return view('fields.edit')->with('field', $field);
    }

    /**
     * Update the specified Field in storage.
     *
     * @param int $id
     * @param UpdateFieldRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFieldRequest $request)
    {
        $field = $this->fieldRepository->find($id);

        if (empty($field)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fields.singular')]));

            return redirect(route('fields.index'));
        }

        $field = $this->fieldRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/fields.singular')]));

        return redirect(route('fields.index'));
    }

    /**
     * Remove the specified Field from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $field = $this->fieldRepository->find($id);

        if (empty($field)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fields.singular')]));

            return redirect(route('fields.index'));
        }

        $this->fieldRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/fields.singular')]));

        return redirect(route('fields.index'));
    }
}
