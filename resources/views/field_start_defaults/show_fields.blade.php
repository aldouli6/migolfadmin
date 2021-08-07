<!-- Field Id Field -->
<div class="form-group">
    {!! Form::label('field_id', __('models/fieldStartDefaults.fields.field_id').':') !!}
    <p>{{ $fieldStartDefault->field_id }}</p>
</div>

<!-- Gender Field -->
<div class="form-group">
    {!! Form::label('gender', __('models/fieldStartDefaults.fields.gender').':') !!}
    <p>{{ $fieldStartDefault->gender }}</p>
</div>

<!-- Start Id Field -->
<div class="form-group">
    {!! Form::label('start_id', __('models/fieldStartDefaults.fields.start_id').':') !!}
    <p>{{ $fieldStartDefault->start_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/fieldStartDefaults.fields.created_at').':') !!}
    <p>{{ $fieldStartDefault->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/fieldStartDefaults.fields.updated_at').':') !!}
    <p>{{ $fieldStartDefault->updated_at }}</p>
</div>

