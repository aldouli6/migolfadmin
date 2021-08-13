<!-- Course Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course_id', __('models/courseTeeDefaults.fields.course_id').':') !!}
    {!! Form::select('course_id', $courseItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', __('models/courseTeeDefaults.fields.gender').':') !!}
    {!! Form::select('gender', ['F' => 'Female', 'M' => 'Male'], null, ['class' => 'form-control']) !!}
</div>

<!-- Tee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tee_id', __('models/courseTeeDefaults.fields.tee_id').':') !!}
    {!! Form::select('tee_id', $teeItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('courseTeeDefaults.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
