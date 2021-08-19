<!-- Player Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('player_id', __('models/userHoleRaitings.fields.player_id').':') !!}
    {!! Form::select('player_id', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Hole Raiting Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hole_raiting_type', __('models/userHoleRaitings.fields.hole_raiting_type').':') !!}
    {!! Form::select('hole_raiting_type', ['NIGUNA' => 'Ninguna', 'DIFHAND' => 'DiferenciaHandicaps', 'HIST' => 'Hitorico', 'FIJO' => 'Fijo', 'MANUAL' => 'Manual'], null, ['class' => 'form-control']) !!}
</div>

<!-- Hole Raitinig Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hole_raitinig', __('models/userHoleRaitings.fields.hole_raitinig').':') !!}
    {!! Form::number('hole_raitinig', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Hole Raiting Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_hole_raiting', __('models/userHoleRaitings.fields.date_hole_raiting').':') !!}
    {!! Form::date('date_hole_raiting', null, ['class' => 'form-control','id'=>'date_hole_raiting']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_hole_raiting').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('userHoleRaitings.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
