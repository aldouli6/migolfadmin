<!-- Player Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('player_id', __('models/userScores.fields.player_id').':') !!}
    {!! Form::select('player_id', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Hole Raiting Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hole_raiting_type', __('models/userScores.fields.hole_raiting_type').':') !!}
    {!! Form::select('hole_raiting_type', ['NIGUNA' => 'Ninguna', 'DIFHAND' => 'DiferenciaHandicaps', 'HIST' => 'Hitorico', 'FIJO' => 'Fijo', 'MANUAL' => 'Manual'], null, ['class' => 'form-control']) !!}
</div>

<!-- Hole Raitinig Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hole_raitinig', __('models/userScores.fields.hole_raitinig').':') !!}
    {!! Form::number('hole_raitinig', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Hole Raiting Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_hole_raiting', __('models/userScores.fields.date_hole_raiting').':') !!}
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

<!-- Handicap Index Field -->
<div class="form-group col-sm-6">
    {!! Form::label('handicap_index', __('models/userScores.fields.handicap_index').':') !!}
    {!! Form::number('handicap_index', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Handicap Index Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_handicap_index', __('models/userScores.fields.date_handicap_index').':') !!}
    {!! Form::date('date_handicap_index', null, ['class' => 'form-control','id'=>'date_handicap_index']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_handicap_index').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Ghin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ghin', __('models/userScores.fields.ghin').':') !!}
    {!! Form::number('ghin', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('userScores.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
