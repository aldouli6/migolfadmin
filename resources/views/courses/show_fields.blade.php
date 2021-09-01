<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/courses.fields.id').':') !!}
    <p>{{ $course->id }}</p>
</div>

<!-- Enabled Field -->
<div class="form-group">
    {!! Form::label('enabled', __('models/courses.fields.enabled').':') !!}
    <p>@if ($course->enabled==1) @lang('crud.yes') @else @lang('crud.no') @endif </p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/courses.fields.description').':') !!}
    <p>{{ $course->description }}</p>
</div>

<!-- Alias Field -->
<div class="form-group">
    {!! Form::label('alias', __('models/courses.fields.alias').':') !!}
    <p>{{ $course->alias }}</p>
</div>

<!-- Club Id Field -->
<div class="form-group">
    {!! Form::label('club_id', __('models/courses.fields.club_id').':') !!}
    <p>{{ $clubItems[$course->club_id] ?? '' }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/courses.fields.created_at').':') !!}
    <p>{{ $course->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/courses.fields.updated_at').':') !!}
    <p>{{ $course->updated_at }}</p>
</div>

