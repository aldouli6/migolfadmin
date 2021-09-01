<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', __('models/teeColors.fields.id').':') !!}
    {!! Form::number('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/teeColors.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Color Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color', __('models/teeColors.fields.color').':') !!}
    {{ Form::input('color', 'color', null,  ['class' => 'form-control']) }}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('teeColors.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
