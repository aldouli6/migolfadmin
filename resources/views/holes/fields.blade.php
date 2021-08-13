<!-- Hole Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hole_number', __('models/holes.fields.hole_number').':') !!}
    {!! Form::number('hole_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Tee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tee_id', __('models/holes.fields.tee_id').':') !!}
    {!! Form::select('tee_id', $teeItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Par Field -->
<div class="form-group col-sm-6">
    {!! Form::label('par', __('models/holes.fields.par').':') !!}
    {!! Form::number('par', null, ['class' => 'form-control']) !!}
</div>

<!-- Hole Raiting Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hole_raiting', __('models/holes.fields.hole_raiting').':') !!}
    {!! Form::number('hole_raiting', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('holes.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
