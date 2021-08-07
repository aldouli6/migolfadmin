<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/userPlayers.fields.id').':') !!}
    <p>{{ $userPlayer->id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/userPlayers.fields.user_id').':') !!}
    <p>{{ $userPlayer->user_id }}</p>
</div>

<!-- Player Id Field -->
<div class="form-group">
    {!! Form::label('player_id', __('models/userPlayers.fields.player_id').':') !!}
    <p>{{ $userPlayer->player_id }}</p>
</div>

<!-- Frequency Field -->
<div class="form-group">
    {!! Form::label('frequency', __('models/userPlayers.fields.frequency').':') !!}
    <p>{{ $userPlayer->frequency }}</p>
</div>

<!-- Field Id Field -->
<div class="form-group">
    {!! Form::label('field_id', __('models/userPlayers.fields.field_id').':') !!}
    <p>{{ $userPlayer->field_id }}</p>
</div>

<!-- Start Id Field -->
<div class="form-group">
    {!! Form::label('start_id', __('models/userPlayers.fields.start_id').':') !!}
    <p>{{ $userPlayer->start_id }}</p>
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

