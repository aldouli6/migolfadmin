<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('models/bets.fields.user_id').':') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/bets.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Classification Field -->
<div class="form-group col-sm-6">
    {!! Form::label('classification', __('models/bets.fields.classification').':') !!}
    {!! Form::select('classification', ['5' => 'Estándar', '0' => 'Normal'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bets.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
