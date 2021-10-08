<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/bets.fields.id').':') !!}
    <p>{{ $bet->id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/bets.fields.user_id').':') !!}
    <p>{{ $bet->user_id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/bets.fields.name').':') !!}
    <p>{{ $bet->name }}</p>
</div>

<!-- Classification Field -->
<div class="form-group">
    {!! Form::label('classification', __('models/bets.fields.classification').':') !!}
    <p>{{ $bet->classification }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/bets.fields.created_at').':') !!}
    <p>{{ $bet->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/bets.fields.updated_at').':') !!}
    <p>{{ $bet->updated_at }}</p>
</div>

