<!-- Player Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('player_id', __('models/userDatas.fields.player_id').':') !!}
    {!! Form::select('player_id', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Lead Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lead_type', __('models/userDatas.fields.lead_type').':') !!}
    {!! Form::select('lead_type', ['NIGUNA' => 'Ninguna', 'DIFHAND' => 'DiferenciaHandicaps', 'HIST' => 'Hitorico', 'FIJO' => 'Fijo', 'MANUAL' => 'Manual'], null, ['class' => 'form-control']) !!}
</div>

<!-- Lead Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lead', __('models/userDatas.fields.lead').':') !!}
    {!! Form::number('lead', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Lead Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_lead', __('models/userDatas.fields.date_lead').':') !!}
    {!! Form::date('date_lead', null, ['class' => 'form-control','id'=>'date_lead']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_lead').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Handicap Index Field -->
<div class="form-group col-sm-6">
    {!! Form::label('handicap_index', __('models/userDatas.fields.handicap_index').':') !!}
    {!! Form::number('handicap_index', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Handicap Index Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_handicap_index', __('models/userDatas.fields.date_handicap_index').':') !!}
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
    {!! Form::label('ghin', __('models/userDatas.fields.ghin').':') !!}
    {!! Form::number('ghin', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Ghin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_ghin', __('models/userDatas.fields.date_ghin').':') !!}
    {!! Form::date('date_ghin', null, ['class' => 'form-control','id'=>'date_ghin']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_ghin').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('userDatas.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
