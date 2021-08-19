<!-- Player Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('player_id', __('models/userHandicapIndices.fields.player_id').':') !!}
    {!! Form::select('player_id', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Handicap Index Field -->
<div class="form-group col-sm-6">
    {!! Form::label('handicap_index', __('models/userHandicapIndices.fields.handicap_index').':') !!}
    {!! Form::number('handicap_index', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Handicap Index Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_handicap_index', __('models/userHandicapIndices.fields.date_handicap_index').':') !!}
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
    {!! Form::label('ghin', __('models/userHandicapIndices.fields.ghin').':') !!}
    {!! Form::number('ghin', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('userHandicapIndices.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
