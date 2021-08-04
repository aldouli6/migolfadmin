<!-- Field Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('field_id', __('models/starts.fields.field_id').':') !!}
    {!! Form::select('field_id', $fieldItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', __('models/starts.fields.gender').':') !!}
    {!! Form::select('gender', ['D' => 'Lady', 'C' => 'Gentleman'], null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Default Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('default', __('models/starts.fields.default').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('default', 0) !!}
        {!! Form::checkbox('default', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Startcolor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('startcolor_id', __('models/starts.fields.startcolor_id').':') !!}
    {!! Form::select('startcolor_id', $start_colorItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Slope Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slope', __('models/starts.fields.slope').':') !!}
    {!! Form::number('slope', null, ['class' => 'form-control']) !!}
</div>

<!-- Rating Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rating', __('models/starts.fields.rating').':') !!}
    {!! Form::number('rating', null, ['class' => 'form-control']) !!}
</div>

<!-- Par Field -->
<div class="form-group col-sm-6">
    {!! Form::label('par', __('models/starts.fields.par').':') !!}
    {!! Form::number('par', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('starts.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
