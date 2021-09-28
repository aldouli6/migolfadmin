<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/userGroups.fields.id').':') !!}
    <p>{{ $userGroup->id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/userGroups.fields.user_id').':') !!}
    <p>{{ $userGroup->user_id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/userGroups.fields.name').':') !!}
    <p>{{ $userGroup->name }}</p>
</div>

<!-- Classification Field -->
<div class="form-group">
    {!! Form::label('classification', __('models/userGroups.fields.classification').':') !!}
    <p>{{ $userGroup->classification }}</p>
</div>

<!-- Players Field -->
<div class="form-group">
    {!! Form::label('players', __('models/userGroups.fields.players').':') !!}
    <p>{{ $userGroup->players }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/userGroups.fields.created_at').':') !!}
    <p>{{ $userGroup->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/userGroups.fields.updated_at').':') !!}
    <p>{{ $userGroup->updated_at }}</p>
</div>

