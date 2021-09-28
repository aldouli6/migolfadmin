<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('models/userGroups.fields.user_id').':') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/userGroups.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Classification Field -->
<div class="form-group col-sm-6">
    {!! Form::label('classification', __('models/userGroups.fields.classification').':') !!}
    {!! Form::select('classification', ['2' => 'Favorito', '3' => 'Normal'], null, ['class' => 'form-control']) !!}
</div>

<!-- Players Field -->
<div class="form-group col-sm-6">
    {!! Form::label('players', __('models/userGroups.fields.players').':') !!}
    {!! Form::text('players', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('userGroups.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
