<!-- Field Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('field_id', __('models/fieldStartDefaults.fields.field_id').':') !!}
    {!! Form::select('field_id', $fieldItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', __('models/fieldStartDefaults.fields.gender').':') !!}
    {!! Form::select('gender', ['F' => 'Female', 'M' => 'Male'], null, ['class' => 'form-control']) !!}
</div>

<!-- Start Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_id', __('models/fieldStartDefaults.fields.start_id').':') !!}
    {!! Form::select('start_id', $startItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('fieldStartDefaults.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
