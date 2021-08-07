<!-- 'bootstrap / Toggle Switch Enabled Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('enabled', __('models/users.fields.enabled').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('enabled', 0) !!}
        {!! Form::checkbox('enabled', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Alias Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alias', __('models/users.fields.alias').':') !!}
    {!! Form::text('alias', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/users.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Lastname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lastname', __('models/users.fields.lastname').':') !!}
    {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', __('models/users.fields.gender').':') !!}
    {!! Form::select('gender', ['F' => 'Female', 'M' => 'Male'], null, ['class' => 'form-control']) !!}
</div>

<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_id', __('models/users.fields.country_id').':') !!}
    {!! Form::select('country_id', $countryItems, null, ['class' => 'form-control']) !!}
</div>

<!-- State Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state_id', __('models/users.fields.state_id').':') !!}
    {!! Form::select('state_id', $stateItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', __('models/users.fields.phone').':') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/users.fields.email').':') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Frequency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('frequency', __('models/users.fields.frequency').':') !!}
    {!! Form::select('frequency', ['RGLR' => 'Regular', 'EVNT' => 'Evetual', 'NRML' => 'Normal'], null, ['class' => 'form-control']) !!}
</div>

<!-- Field Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('field_id', __('models/users.fields.field_id').':') !!}
    {!! Form::select('field_id', $fieldItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Role Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role', __('models/users.fields.role').':') !!}
    {!! Form::select('role', $roleItems, isset($roleItems)?$user->roles()->pluck('name'):[], ['class' => 'form-control']) !!}
</div>

<!-- Start Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_id', __('models/users.fields.start_id').':') !!}
    {!! Form::select('start_id', $startItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
