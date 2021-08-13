<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/teeColors.fields.id').':') !!}
    <p>{{ $teeColor->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/teeColors.fields.name').':') !!}
    <p>{{ $teeColor->name }}</p>
</div>

<!-- Color Field -->
<div class="form-group">
    {!! Form::label('color', __('models/teeColors.fields.color').':') !!}
    <p>{{ $teeColor->color }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/teeColors.fields.created_at').':') !!}
    <p>{{ $teeColor->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/teeColors.fields.updated_at').':') !!}
    <p>{{ $teeColor->updated_at }}</p>
</div>

