<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('models/userCourses.fields.user_id').':') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Course Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course_id', __('models/userCourses.fields.course_id').':') !!}
    {!! Form::select('course_id', $courseItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Classification Field -->
<div class="form-group col-sm-6">
    {!! Form::label('classification', __('models/userCourses.fields.classification').':') !!}
    {!! Form::select('classification', ['1' => 'Sede', '2' => 'Preferido', '3' => 'Normal'], null, ['class' => 'form-control']) !!}
</div>

<!-- Tee Default Male Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tee_default_male', __('models/userCourses.fields.tee_default_male').':') !!}
    {!! Form::select('tee_default_male', $teesMales, null, ['class' => 'form-control']) !!}
</div>

<!-- Tee Default Female Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tee_default_female', __('models/userCourses.fields.tee_default_female').':') !!}
    {!! Form::select('tee_default_female', $teesFemales, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('userCourses.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
