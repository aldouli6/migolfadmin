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

<!-- Lead Type Field -->
<div class="form-group">
    {!! Form::label('lead_type', __('models/userScores.fields.lead_type').':') !!}
    <p>{{ $userScore->lead_type }}</p>
</div>

<!-- Lead Field -->
<div class="form-group">
    {!! Form::label('lead', __('models/userScores.fields.lead').':') !!}
    <p>{{ $userScore->lead }}</p>
</div>

<!-- Date Lead Field -->
<div class="form-group">
    {!! Form::label('date_lead', __('models/userScores.fields.date_lead').':') !!}
    <p>{{ $userScore->date_lead }}</p>
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

<!-- Date Ghin Field -->
<div class="form-group">
    {!! Form::label('date_ghin', __('models/userScores.fields.date_ghin').':') !!}
    <p>{{ $userScore->date_ghin }}</p>
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

