<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/tees.fields.id').':') !!}
    <p>{{ $tee->id }}</p>
</div>

<!-- Enabled Field -->
<div class="form-group">
    {!! Form::label('enabled', __('models/tees.fields.enabled').':') !!}
    <p>@if ($tee->enabled==1) @lang('crud.yes') @else @lang('crud.no') @endif </p>
</div>

<!-- Default Field -->
<div class="form-group">
    {!! Form::label('default', __('models/tees.fields.default').':') !!}
    <p>@if ($tee->default==1) @lang('crud.yes') @else @lang('crud.no') @endif </p>
</div>

<!-- Course Id Field -->
<div class="form-group">
    {!! Form::label('course_id', __('models/tees.fields.course_id').':') !!}
    <p>{{ $courseItems[$tee->course_id] ?? '' }}</p>
</div>

<!-- Gender Field -->
<div class="form-group">
    {!! Form::label('gender', __('models/tees.fields.gender').':') !!}
    <p>@lang('models/tees.fields.'.$tee->gender  )</p>
</div>

<!-- Teecolor Id Field -->
<div class="form-group">
    {!! Form::label('teecolor_id', __('models/tees.fields.teecolor_id').':') !!}
    <p>{{ $tee_colorItems[$tee->teecolor_id] ?? '' }}</p>
</div>

<!-- Slope Field -->
<div class="form-group">
    {!! Form::label('slope', __('models/tees.fields.slope').':') !!}
    <p>{{ $tee->slope }}</p>
</div>

<!-- Rating Field -->
<div class="form-group">
    {!! Form::label('rating', __('models/tees.fields.rating').':') !!}
    <p>{{ $tee->rating }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/tees.fields.created_at').':') !!}
    <p>{{ $tee->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/tees.fields.updated_at').':') !!}
    <p>{{ $tee->updated_at }}</p>
</div>

