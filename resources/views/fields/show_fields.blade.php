<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/fields.fields.id').':') !!}
    <p>{{ $field->id }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/fields.fields.description').':') !!}
    <p>{{ $field->description }}</p>
</div>

<!-- Alias Field -->
<div class="form-group">
    {!! Form::label('alias', __('models/fields.fields.alias').':') !!}
    <p>{{ $field->alias }}</p>
</div>

<!-- Club Id Field -->
<div class="form-group">
    {!! Form::label('club_id', __('models/fields.fields.club_id').':') !!}
    <p>{{ $field->club_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/fields.fields.created_at').':') !!}
    <p>{{ $field->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/fields.fields.updated_at').':') !!}
    <p>{{ $field->updated_at }}</p>
</div>

