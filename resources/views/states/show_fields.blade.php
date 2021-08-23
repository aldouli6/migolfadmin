<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/states.fields.id').':') !!}
    <p>{{ $state->id }}</p>
</div>

<!-- Enabled Field -->
<div class="form-group">
    {!! Form::label('enabled', __('models/states.fields.enabled').':') !!}
    <p>{{ $state->enabled }}</p>
</div>

<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', __('models/states.fields.country_id').':') !!}
    <p>{{ $state->country_id }}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', __('models/states.fields.code').':') !!}
    <p>{{ $state->code }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/states.fields.name').':') !!}
    <p>{{ $state->name }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/states.fields.created_at').':') !!}
    <p>{{ $state->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/states.fields.updated_at').':') !!}
    <p>{{ $state->updated_at }}</p>
</div>

