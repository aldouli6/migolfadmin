<!-- Hole Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hole_number', __('models/holes.fields.hole_number').':') !!}
    {!! Form::number('hole_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Course Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course_id', __('models/holes.fields.course_id').':') !!}
    {!! Form::select('course_id', $courseItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Par Field -->
<div class="form-group col-sm-6">
    {!! Form::label('par', __('models/holes.fields.par').':') !!}
    {!! Form::number('par', null, ['class' => 'form-control']) !!}
</div>

<!-- Hole Raiting Male Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hole_raiting_male', __('models/holes.fields.hole_raiting_male').':') !!}
    {!! Form::number('hole_raiting_male', null, ['class' => 'form-control']) !!}
</div>

<!-- Hole Raiting Female Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hole_raiting_female', __('models/holes.fields.hole_raiting_female').':') !!}
    {!! Form::number('hole_raiting_female', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('holes.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
