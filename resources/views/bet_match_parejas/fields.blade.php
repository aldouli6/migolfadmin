<!-- Bet Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bet_id', __('models/betMatchParejas.fields.bet_id').':') !!}
    {!! Form::select('bet_id', $betItems, null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Enabled Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('enabled', __('models/betMatchParejas.fields.enabled').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('enabled', 0) !!}
        {!! Form::checkbox('enabled', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Bet1 9 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bet1_9', __('models/betMatchParejas.fields.bet1_9').':') !!}
    {!! Form::number('bet1_9', null, ['class' => 'form-control']) !!}
</div>

<!-- Bet10 18 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bet10_18', __('models/betMatchParejas.fields.bet10_18').':') !!}
    {!! Form::number('bet10_18', null, ['class' => 'form-control']) !!}
</div>

<!-- Bet Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bet_total', __('models/betMatchParejas.fields.bet_total').':') !!}
    {!! Form::number('bet_total', null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Press Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('press', __('models/betMatchParejas.fields.press').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('press', 0) !!}
        {!! Form::checkbox('press', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Press Bet Field -->
<div class="form-group col-sm-6">
    {!! Form::label('press_bet', __('models/betMatchParejas.fields.press_bet').':') !!}
    {!! Form::number('press_bet', null, ['class' => 'form-control']) !!}
</div>

<!-- Press Every Field -->
<div class="form-group col-sm-6">
    {!! Form::label('press_every', __('models/betMatchParejas.fields.press_every').':') !!}
    {!! Form::select('press_every', ['3' => '3', '4' => '4', '5' => '5', '6' => '6'], null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Carrry Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('carrry', __('models/betMatchParejas.fields.carrry').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('carrry', 0) !!}
        {!! Form::checkbox('carrry', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('betMatchParejas.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
