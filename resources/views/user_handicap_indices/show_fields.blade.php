<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/userHandicapIndices.fields.id').':') !!}
    <p>{{ $userHandicapIndex->id }}</p>
</div>

<!-- Player Id Field -->
<div class="form-group">
    {!! Form::label('player_id', __('models/userHandicapIndices.fields.player_id').':') !!}
    <p>{{ $userItems[$userHandicapIndex->player_id] ?? '' }}</p>
</div>

<!-- Handicap Index Field -->
<div class="form-group">
    {!! Form::label('handicap_index', __('models/userHandicapIndices.fields.handicap_index').':') !!}
    <p>{{ $userHandicapIndex->handicap_index }}</p>
</div>

<!-- Date Handicap Index Field -->
<div class="form-group">
    {!! Form::label('date_handicap_index', __('models/userHandicapIndices.fields.date_handicap_index').':') !!}
    <p>{{ $userHandicapIndex->date_handicap_index }}</p>
</div>

<!-- Ghin Field -->
<div class="form-group">
    {!! Form::label('ghin', __('models/userHandicapIndices.fields.ghin').':') !!}
    <p>{{ $userHandicapIndex->ghin }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/userHandicapIndices.fields.created_at').':') !!}
    <p>{{ $userHandicapIndex->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/userHandicapIndices.fields.updated_at').':') !!}
    <p>{{ $userHandicapIndex->updated_at }}</p>
</div>

