<!-- Bet Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bet_id', __('models/betRayaPuntos.fields.bet_id').':') !!}
    {!! Form::select('bet_id', $betItems, null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Enabled Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('enabled', __('models/betRayaPuntos.fields.enabled').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('enabled', 0) !!}
        {!! Form::checkbox('enabled', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Bet Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bet', __('models/betRayaPuntos.fields.bet').':') !!}
    {!! Form::number('bet', null, ['class' => 'form-control']) !!}
</div>

<!-- Birdie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birdie', __('models/betRayaPuntos.fields.birdie').':') !!}
    {!! Form::number('birdie', null, ['class' => 'form-control']) !!}
</div>

<!-- Aguila Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aguila', __('models/betRayaPuntos.fields.aguila').':') !!}
    {!! Form::number('aguila', null, ['class' => 'form-control']) !!}
</div>

<!-- Albatros Field -->
<div class="form-group col-sm-6">
    {!! Form::label('albatros', __('models/betRayaPuntos.fields.albatros').':') !!}
    {!! Form::number('albatros', null, ['class' => 'form-control']) !!}
</div>

<!-- Hoyo Uno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hoyo_uno', __('models/betRayaPuntos.fields.hoyo_uno').':') !!}
    {!! Form::number('hoyo_uno', null, ['class' => 'form-control']) !!}
</div>

<!-- Exceso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('exceso', __('models/betRayaPuntos.fields.exceso').':') !!}
    {!! Form::number('exceso', null, ['class' => 'form-control']) !!}
</div>

<!-- Mas Golpes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mas_golpes', __('models/betRayaPuntos.fields.mas_golpes').':') !!}
    {!! Form::text('mas_golpes', null, ['class' => 'form-control']) !!}
</div>

<!-- Label1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('label1', __('models/betRayaPuntos.fields.label1').':') !!}
    {!! Form::text('label1', null, ['class' => 'form-control']) !!}
</div>

<!-- Value1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value1', __('models/betRayaPuntos.fields.value1').':') !!}
    {!! Form::number('value1', null, ['class' => 'form-control']) !!}
</div>

<!-- Label2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('label2', __('models/betRayaPuntos.fields.label2').':') !!}
    {!! Form::text('label2', null, ['class' => 'form-control']) !!}
</div>

<!-- Value2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value2', __('models/betRayaPuntos.fields.value2').':') !!}
    {!! Form::number('value2', null, ['class' => 'form-control']) !!}
</div>

<!-- Label3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('label3', __('models/betRayaPuntos.fields.label3').':') !!}
    {!! Form::text('label3', null, ['class' => 'form-control']) !!}
</div>

<!-- Value3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value3', __('models/betRayaPuntos.fields.value3').':') !!}
    {!! Form::number('value3', null, ['class' => 'form-control']) !!}
</div>

<!-- Label4 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('label4', __('models/betRayaPuntos.fields.label4').':') !!}
    {!! Form::text('label4', null, ['class' => 'form-control']) !!}
</div>

<!-- Value4 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value4', __('models/betRayaPuntos.fields.value4').':') !!}
    {!! Form::number('value4', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('betRayaPuntos.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
