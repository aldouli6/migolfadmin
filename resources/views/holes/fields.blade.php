<!-- Hole Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hole_number', __('models/holes.fields.hole_number').':') !!}
    {!! Form::number('hole_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_id', __('models/holes.fields.start_id').':') !!}
    {!! Form::select('start_id', $startItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Par Field -->
<div class="form-group col-sm-6">
    {!! Form::label('par', __('models/holes.fields.par').':') !!}
    {!! Form::number('par', null, ['class' => 'form-control']) !!}
</div>

<!-- Lead Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lead', __('models/holes.fields.lead').':') !!}
    {!! Form::number('lead', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('holes.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
