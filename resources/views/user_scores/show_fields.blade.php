<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/userScores.fields.id').':') !!}
    <p>{{ $userScore->id }}</p>
</div>

<!-- Player Id Field -->
<div class="form-group">
    {!! Form::label('player_id', __('models/userScores.fields.player_id').':') !!}
    <p>{{ $userScore->player_id }}</p>
</div>

<!-- Hole Raiting Type Field -->
<div class="form-group">
    {!! Form::label('hole_raiting_type', __('models/userScores.fields.hole_raiting_type').':') !!}
    <p>{{ $userScore->hole_raiting_type }}</p>
</div>

<!-- Hole Raitinig Field -->
<div class="form-group">
    {!! Form::label('hole_raitinig', __('models/userScores.fields.hole_raitinig').':') !!}
    <p>{{ $userScore->hole_raitinig }}</p>
</div>

<!-- Date Hole Raiting Field -->
<div class="form-group">
    {!! Form::label('date_hole_raiting', __('models/userScores.fields.date_hole_raiting').':') !!}
    <p>{{ $userScore->date_hole_raiting }}</p>
</div>

<!-- Handicap Index Field -->
<div class="form-group">
    {!! Form::label('handicap_index', __('models/userScores.fields.handicap_index').':') !!}
    <p>{{ $userScore->handicap_index }}</p>
</div>

<!-- Date Handicap Index Field -->
<div class="form-group">
    {!! Form::label('date_handicap_index', __('models/userScores.fields.date_handicap_index').':') !!}
    <p>{{ $userScore->date_handicap_index }}</p>
</div>

<!-- Ghin Field -->
<div class="form-group">
    {!! Form::label('ghin', __('models/userScores.fields.ghin').':') !!}
    <p>{{ $userScore->ghin }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/userScores.fields.created_at').':') !!}
    <p>{{ $userScore->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/userScores.fields.updated_at').':') !!}
    <p>{{ $userScore->updated_at }}</p>
</div>

