<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/clubs.fields.id').':') !!}
    <p>{{ $club->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/clubs.fields.name').':') !!}
    <p>{{ $club->name }}</p>
</div>

<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', __('models/clubs.fields.country_id').':') !!}
    <p>{{ $club->country_id }}</p>
</div>

<!-- State Id Field -->
<div class="form-group">
    {!! Form::label('state_id', __('models/clubs.fields.state_id').':') !!}
    <p>{{ $club->state_id }}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city', __('models/clubs.fields.city').':') !!}
    <p>{{ $club->city }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/clubs.fields.email').':') !!}
    <p>{{ $club->email }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/clubs.fields.created_at').':') !!}
    <p>{{ $club->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/clubs.fields.updated_at').':') !!}
    <p>{{ $club->updated_at }}</p>
</div>

