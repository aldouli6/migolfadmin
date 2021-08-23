<!-- 'bootstrap / Toggle Switch Enabled Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('enabled', __('models/courses.fields.enabled').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('enabled', 0) !!}
        {!! Form::checkbox('enabled', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/courses.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Alias Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alias', __('models/courses.fields.alias').':') !!}
    {!! Form::text('alias', null, ['class' => 'form-control']) !!}
</div>

<!-- Club Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('club_id', __('models/courses.fields.club_id').':') !!}
    {!! Form::select('club_id', $clubItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('courses.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
