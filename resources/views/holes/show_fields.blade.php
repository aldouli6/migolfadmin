<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/holes.fields.id').':') !!}
    <p>{{ $hole->id }}</p>
</div>

<!-- Hole Number Field -->
<div class="form-group">
    {!! Form::label('hole_number', __('models/holes.fields.hole_number').':') !!}
    <p>{{ $hole->hole_number }}</p>
</div>

<!-- Course Id Field -->
<div class="form-group">
    {!! Form::label('course_id', __('models/holes.fields.course_id').':') !!}
    <p>{{ $courseItems[ $hole->course_id]  }}</p>
</div>

<!-- Par Field -->
<div class="form-group">
    {!! Form::label('par', __('models/holes.fields.par').':') !!}
    <p>{{ $hole->par }}</p>
</div>

<!-- Hole Raiting Male Field -->
<div class="form-group">
    {!! Form::label('hole_raiting_male', __('models/holes.fields.hole_raiting_male').':') !!}
    <p>{{ $hole->hole_raiting_male }}</p>
</div>

<!-- Hole Raiting Female Field -->
<div class="form-group">
    {!! Form::label('hole_raiting_female', __('models/holes.fields.hole_raiting_female').':') !!}
    <p>{{ $hole->hole_raiting_female }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/holes.fields.created_at').':') !!}
    <p>{{ $hole->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/holes.fields.updated_at').':') !!}
    <p>{{ $hole->updated_at }}</p>
</div>

