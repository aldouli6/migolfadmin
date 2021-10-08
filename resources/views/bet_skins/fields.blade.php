<!-- Bet Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bet_id', __('models/betSkins.fields.bet_id').':') !!}
    {!! Form::select('bet_id', $betItems, null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Enabled Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('enabled', __('models/betSkins.fields.enabled').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('enabled', 0) !!}
        {!! Form::checkbox('enabled', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Bet Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bet', __('models/betSkins.fields.bet').':') !!}
    {!! Form::number('bet', null, ['class' => 'form-control']) !!}
</div>

<!-- Ventaja Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ventaja', __('models/betSkins.fields.ventaja').':') !!}
    {!! Form::select('ventaja', ['de_campo' => 'DeCampo', 'menor_hcp' => 'MenorHandicap', 'individual' => 'Individual'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('betSkins.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
