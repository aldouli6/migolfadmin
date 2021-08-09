<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/userDatas.fields.id').':') !!}
    <p>{{ $userData->id }}</p>
</div>

<!-- Player Id Field -->
<div class="form-group">
    {!! Form::label('player_id', __('models/userDatas.fields.player_id').':') !!}
    <p>{{ $userData->player_id }}</p>
</div>

<!-- Lead Type Field -->
<div class="form-group">
    {!! Form::label('lead_type', __('models/userDatas.fields.lead_type').':') !!}
    <p>{{ $userData->lead_type }}</p>
</div>

<!-- Lead Field -->
<div class="form-group">
    {!! Form::label('lead', __('models/userDatas.fields.lead').':') !!}
    <p>{{ $userData->lead }}</p>
</div>

<!-- Date Lead Field -->
<div class="form-group">
    {!! Form::label('date_lead', __('models/userDatas.fields.date_lead').':') !!}
    <p>{{ $userData->date_lead }}</p>
</div>

<!-- Handicap Index Field -->
<div class="form-group">
    {!! Form::label('handicap_index', __('models/userDatas.fields.handicap_index').':') !!}
    <p>{{ $userData->handicap_index }}</p>
</div>

<!-- Date Handicap Index Field -->
<div class="form-group">
    {!! Form::label('date_handicap_index', __('models/userDatas.fields.date_handicap_index').':') !!}
    <p>{{ $userData->date_handicap_index }}</p>
</div>

<!-- Ghin Field -->
<div class="form-group">
    {!! Form::label('ghin', __('models/userDatas.fields.ghin').':') !!}
    <p>{{ $userData->ghin }}</p>
</div>

<!-- Date Ghin Field -->
<div class="form-group">
    {!! Form::label('date_ghin', __('models/userDatas.fields.date_ghin').':') !!}
    <p>{{ $userData->date_ghin }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/userDatas.fields.created_at').':') !!}
    <p>{{ $userData->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/userDatas.fields.updated_at').':') !!}
    <p>{{ $userData->updated_at }}</p>
</div>

