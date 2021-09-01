<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/users.fields.id').':') !!}
    <p>{{ $user->id }}</p>
</div>

<!-- Enabled Field -->
<div class="form-group">
    {!! Form::label('enabled', __('models/users.fields.enabled').':') !!}
    <p>@if ($user->enabled==1) @lang('crud.yes') @else @lang('crud.no') @endif </p>
</div>

<!-- Alias Field -->
<div class="form-group">
    {!! Form::label('alias', __('models/users.fields.alias').':') !!}
    <p>{{ $user->alias }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/users.fields.name').':') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Lastname Field -->
<div class="form-group">
    {!! Form::label('lastname', __('models/users.fields.lastname').':') !!}
    <p>{{ $user->lastname }}</p>
</div>

<!-- Gender Field -->
<div class="form-group">
    {!! Form::label('gender', __('models/users.fields.gender').':') !!}
    <p>{{ $user->gender }}</p>
</div>

<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', __('models/users.fields.country_id').':') !!}
    <p>{{ $user->country_id }}</p>
</div>

<!-- State Id Field -->
<div class="form-group">
    {!! Form::label('state_id', __('models/users.fields.state_id').':') !!}
    <p>{{ $user->state_id }}</p>
</div>

<!-- Phone Code Field -->
<div class="form-group">
    {!! Form::label('phone_code', __('models/users.fields.phone_code').':') !!}
    <p>{{ $user->phone_code }}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', __('models/users.fields.phone').':') !!}
    <p>{{ $user->phone }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/users.fields.email').':') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Role Field -->
<div class="form-group">
    {!! Form::label('role', __('models/users.fields.role').':') !!}
    <p>{{ $user->role }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/users.fields.created_at').':') !!}
    <p>{{ $user->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/users.fields.updated_at').':') !!}
    <p>{{ $user->updated_at }}</p>
</div>

