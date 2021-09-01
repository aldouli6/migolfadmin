<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/userHoleRaitings.fields.id').':') !!}
    <p>{{ $userHoleRaiting->id }}</p>
</div>

<!-- Player Id Field -->
<div class="form-group">
    {!! Form::label('player_id', __('models/userHoleRaitings.fields.player_id').':') !!}
    <p>{{ $userItems[$userHoleRaiting->player_id] ?? '' }}</p>
</div>

<!-- Hole Raiting Type Field -->
<div class="form-group">
    {!! Form::label('hole_raiting_type', __('models/userHoleRaitings.fields.hole_raiting_type').':') !!}
    <p>@lang('models/userHoleRaitings.fields.'.$userHoleRaiting->hole_raiting_type  )</p>
</div>

<!-- Hole Raitinig Field -->
<div class="form-group">
    {!! Form::label('hole_raitinig', __('models/userHoleRaitings.fields.hole_raitinig').':') !!}
    <p>{{ $userHoleRaiting->hole_raitinig }}</p>
</div>

<!-- Date Hole Raiting Field -->
<div class="form-group">
    {!! Form::label('date_hole_raiting', __('models/userHoleRaitings.fields.date_hole_raiting').':') !!}
    <p>{{ $userHoleRaiting->date_hole_raiting }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/userHoleRaitings.fields.created_at').':') !!}
    <p>{{ $userHoleRaiting->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/userHoleRaitings.fields.updated_at').':') !!}
    <p>{{ $userHoleRaiting->updated_at }}</p>
</div>

