<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('models/userClubs.fields.user_id').':') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Club Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('club_id', __('models/userClubs.fields.club_id').':') !!}
    {!! Form::select('club_id', $clubItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Clasification Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clasification', __('models/userClubs.fields.clasification').':') !!}
    {!! Form::select('clasification', ['1' => 'Sede', '2' => 'Preferido', '3' => 'Normal'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('userClubs.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
