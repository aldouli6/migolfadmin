<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/userPlayers.fields.id').':') !!}
    <p>{{ $userPlayer->id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/userPlayers.fields.user_id').':') !!}
    <p>{{ $userItems[$userPlayer->user_id] ?? '' }}</p>
</div>

<!-- Player Id Field -->
<div class="form-group">
    {!! Form::label('player_id', __('models/userPlayers.fields.player_id').':') !!}
    <p>{{ $userItems[$userPlayer->player_id] ?? '' }}</p>
</div>

<!-- Frequency Field -->
<div class="form-group">
    {!! Form::label('frequency', __('models/userPlayers.fields.frequency').':') !!}
    <p>@lang('models/userPlayers.fields.'.$userPlayer->frequency  )</p>
</div>

<!-- Tee Color Id Field -->
<div class="form-group">
    {!! Form::label('tee_color_id', __('models/userPlayers.fields.tee_color_id').':') !!}
    <p>{{ $userPlayer->tee_color_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/userPlayers.fields.created_at').':') !!}
    <p>{{ $userPlayer->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/userPlayers.fields.updated_at').':') !!}
    <p>{{ $userPlayer->updated_at }}</p>
</div>

