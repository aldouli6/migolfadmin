<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('models/userPlayers.fields.user_id').':') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Player Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('player_id', __('models/userPlayers.fields.player_id').':') !!}
    {!! Form::select('player_id', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Frequency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('frequency', __('models/userPlayers.fields.frequency').':') !!}
    {!! Form::select('frequency', ['USER' => 'Usuario', 'RGLR' => 'Regular', 'EVNT' => 'Evetual', 'NRML' => 'Normal'], null, ['class' => 'form-control']) !!}
</div>

<!-- Course Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course_id', __('models/userPlayers.fields.course_id').':') !!}
    {!! Form::select('course_id', $courseItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Tee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tee_id', __('models/userPlayers.fields.tee_id').':') !!}
    {!! Form::select('tee_id', $teeItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('userPlayers.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
