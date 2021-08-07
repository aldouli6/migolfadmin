<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFieldStartDefaultRequest;
use App\Http\Requests\UpdateFieldStartDefaultRequest;
use App\Repositories\FieldStartDefaultRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FieldStartDefaultController extends AppBaseController
{
    /** @var  FieldStartDefaultRepository */
    private $fieldStartDefaultRepository;

    public function __construct(FieldStartDefaultRepository $fieldStartDefaultRepo)
    {
        $this->fieldStartDefaultRepository = $fieldStartDefaultRepo;
    }

    /**
     * Display a listing of the FieldStartDefault.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $fieldStartDefaults = $this->fieldStartDefaultRepository->all();

        return view('field_start_defaults.index')
            ->with('fieldStartDefaults', $fieldStartDefaults);
    }

    /**
     * Show the form for creating a new FieldStartDefault.
     *
     * @return Response
     */
    public function create()
    {
        return view('field_start_defaults.create');
    }

    /**
     * Store a newly created FieldStartDefault in storage.
     *
     * @param CreateFieldStartDefaultRequest $request
     *
     * @return Response
     */
    public function store(CreateFieldStartDefaultRequest $request)
    {
        $input = $request->all();

        $fieldStartDefault = $this->fieldStartDefaultRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/fieldStartDefaults.singular')]));

        return redirect(route('fieldStartDefaults.index'));
    }

    /**
     * Display the specified FieldStartDefault.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fieldStartDefault = $this->fieldStartDefaultRepository->find($id);

        if (empty($fieldStartDefault)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fieldStartDefaults.singular')]));

            return redirect(route('fieldStartDefaults.index'));
        }

        return view('field_start_defaults.show')->with('fieldStartDefault', $fieldStartDefault);
    }

    /**
     * Show the form for editing the specified FieldStartDefault.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fieldStartDefault = $this->fieldStartDefaultRepository->find($id);

        if (empty($fieldStartDefault)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fieldStartDefaults.singular')]));

            return redirect(route('fieldStartDefaults.index'));
        }

        return view('field_start_defaults.edit')->with('fieldStartDefault', $fieldStartDefault);
    }

    /**
     * Update the specified FieldStartDefault in storage.
     *
     * @param int $id
     * @param UpdateFieldStartDefaultRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFieldStartDefaultRequest $request)
    {
        $fieldStartDefault = $this->fieldStartDefaultRepository->find($id);

        if (empty($fieldStartDefault)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fieldStartDefaults.singular')]));

            return redirect(route('fieldStartDefaults.index'));
        }

        $fieldStartDefault = $this->fieldStartDefaultRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/fieldStartDefaults.singular')]));

        return redirect(route('fieldStartDefaults.index'));
    }

    /**
     * Remove the specified FieldStartDefault from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fieldStartDefault = $this->fieldStartDefaultRepository->find($id);

        if (empty($fieldStartDefault)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fieldStartDefaults.singular')]));

            return redirect(route('fieldStartDefaults.index'));
        }

        $this->fieldStartDefaultRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/fieldStartDefaults.singular')]));

        return redirect(route('fieldStartDefaults.index'));
    }
}
