<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/userFields.fields.id').':') !!}
    <p>{{ $userField->id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/userFields.fields.user_id').':') !!}
    <p>{{ $userField->user_id }}</p>
</div>

<!-- Field Id Field -->
<div class="form-group">
    {!! Form::label('field_id', __('models/userFields.fields.field_id').':') !!}
    <p>{{ $userField->field_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/userFields.fields.created_at').':') !!}
    <p>{{ $userField->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/userFields.fields.updated_at').':') !!}
    <p>{{ $userField->updated_at }}</p>
</div>

