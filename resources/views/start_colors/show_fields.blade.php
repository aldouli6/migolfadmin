<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/startColors.fields.id').':') !!}
    <p>{{ $startColor->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/startColors.fields.name').':') !!}
    <p>{{ $startColor->name }}</p>
</div>

<!-- Icon Field -->
<div class="form-group">
    {!! Form::label('icon', __('models/startColors.fields.icon').':') !!}
    <p>{{ $startColor->icon }}</p>
</div>

<!-- Leads Field -->
<div class="form-group">
    {!! Form::label('leads', __('models/startColors.fields.leads').':') !!}
    <p>{{ $startColor->leads }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/startColors.fields.created_at').':') !!}
    <p>{{ $startColor->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/startColors.fields.updated_at').':') !!}
    <p>{{ $startColor->updated_at }}</p>
</div>

