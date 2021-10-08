<!-- Bet Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bet_id', __('models/betMedalPlays.fields.bet_id').':') !!}
    {!! Form::select('bet_id', $betItems, null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Enabled Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('enabled', __('models/betMedalPlays.fields.enabled').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('enabled', 0) !!}
        {!! Form::checkbox('enabled', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Bet1 9 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bet1_9', __('models/betMedalPlays.fields.bet1_9').':') !!}
    {!! Form::number('bet1_9', null, ['class' => 'form-control']) !!}
</div>

<!-- Bet10 18 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bet10_18', __('models/betMedalPlays.fields.bet10_18').':') !!}
    {!! Form::number('bet10_18', null, ['class' => 'form-control']) !!}
</div>

<!-- Bet Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bet_total', __('models/betMedalPlays.fields.bet_total').':') !!}
    {!! Form::number('bet_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Empate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('empate', __('models/betMedalPlays.fields.empate').':') !!}
    {!! Form::select('empate', ['divide' => 'SeDivide', 'gana_mejor' => 'GanaMejorHandicap'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('betMedalPlays.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
