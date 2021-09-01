<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/userClubs.fields.id').':') !!}
    <p>{{ $userClub->id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/userClubs.fields.user_id').':') !!}
    <p>{{ $userItems[$userClub->user_id] ?? '' }}</p>
</div>

<!-- Club Id Field -->
<div class="form-group">
    {!! Form::label('club_id', __('models/userClubs.fields.club_id').':') !!}
    <p>{{ $clubItems[$userClub->club_id] ?? '' }}</p>
</div>

<!-- Classification Field -->
<div class="form-group">
    {!! Form::label('classification', __('models/userClubs.fields.classification').':') !!}
    <p>@lang('models/userClubs.fields.0'.$userClub->classification  )</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/userClubs.fields.created_at').':') !!}
    <p>{{ $userClub->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/userClubs.fields.updated_at').':') !!}
    <p>{{ $userClub->updated_at }}</p>
</div>

