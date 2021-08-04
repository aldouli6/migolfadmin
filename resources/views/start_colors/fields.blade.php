<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', __('models/startColors.fields.id').':') !!}
    {!! Form::number('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/startColors.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Icon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('icon', __('models/startColors.fields.icon').':') !!}
    {!! Form::text('icon', null, ['class' => 'form-control']) !!}
</div>

<!-- Leads Field -->
<div class="form-group col-sm-6">
    {!! Form::label('leads', __('models/startColors.fields.leads').':') !!}
    {!! Form::number('leads', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('startColors.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
