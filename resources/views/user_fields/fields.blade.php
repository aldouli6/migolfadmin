<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('models/userFields.fields.user_id').':') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Field Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('field_id', __('models/userFields.fields.field_id').':') !!}
    {!! Form::select('field_id', $fieldItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('userFields.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
