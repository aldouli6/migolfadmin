<!-- Bet Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bet_id', __('models/betGreens.fields.bet_id').':') !!}
    {!! Form::select('bet_id', $betItems, null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Enabled Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('enabled', __('models/betGreens.fields.enabled').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('enabled', 0) !!}
        {!! Form::checkbox('enabled', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Bet Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bet', __('models/betGreens.fields.bet').':') !!}
    {!! Form::number('bet', null, ['class' => 'form-control']) !!}
</div>

<!-- Condicion1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('condicion1', __('models/betGreens.fields.condicion1').':') !!}
    {!! Form::select('condicion1', ['uno_gana' => 'UnoGana', 'varios_ganan' => 'VariosGanan'], null, ['class' => 'form-control']) !!}
</div>

<!-- Condicion2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('condicion2', __('models/betGreens.fields.condicion2').':') !!}
    {!! Form::select('condicion2', ['acumula_empates' => 'AcumulaEmpates', 'no_acumula' => 'NoAcumula'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('betGreens.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
