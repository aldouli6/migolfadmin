<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/fields.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Alias Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alias', __('models/fields.fields.alias').':') !!}
    {!! Form::text('alias', null, ['class' => 'form-control']) !!}
</div>

<!-- Club Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('club_id', __('models/fields.fields.club_id').':') !!}
    {!! Form::select('club_id', $clubItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('fields.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
