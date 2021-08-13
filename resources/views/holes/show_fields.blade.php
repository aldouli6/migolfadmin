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

<!-- Tee Id Field -->
<div class="form-group">
    {!! Form::label('tee_id', __('models/holes.fields.tee_id').':') !!}
    <p>{{ $hole->tee_id }}</p>
</div>

<!-- Par Field -->
<div class="form-group">
    {!! Form::label('par', __('models/holes.fields.par').':') !!}
    <p>{{ $hole->par }}</p>
</div>

<!-- Hole Raiting Field -->
<div class="form-group">
    {!! Form::label('hole_raiting', __('models/holes.fields.hole_raiting').':') !!}
    <p>{{ $hole->hole_raiting }}</p>
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

