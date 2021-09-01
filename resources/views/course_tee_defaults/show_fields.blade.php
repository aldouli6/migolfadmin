<!-- Course Id Field -->
<div class="form-group">
    {!! Form::label('course_id', __('models/courseTeeDefaults.fields.course_id').':') !!}
    <p>{{ $courseItems[$courseTeeDefault->course_id] ?? '' }}</p>
</div>

<!-- Gender Field -->
<div class="form-group">
    {!! Form::label('gender', __('models/courseTeeDefaults.fields.gender').':') !!}
    <p>@lang('models/tees.fields.'.$courseTeeDefault->gender  )</p>
</div>

<!-- Tee Id Field -->
<div class="form-group">
    {!! Form::label('tee_id', __('models/courseTeeDefaults.fields.tee_id').':') !!}
    <p>{{  $tee_colorItems[ $teeItems[$courseTeeDefault->tee_id]] }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/courseTeeDefaults.fields.created_at').':') !!}
    <p>{{ $courseTeeDefault->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/courseTeeDefaults.fields.updated_at').':') !!}
    <p>{{ $courseTeeDefault->updated_at }}</p>
</div>

