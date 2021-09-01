<!-- 'bootstrap / Toggle Switch Enabled Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('enabled', __('models/countries.fields.enabled').':') !!}
        {!! Form::hidden('enabled', 0) !!}
    {!! Form::checkbox('enabled', 1, $country->enabled,  ['data-toggle' => 'toggle','data-on'=>__('crud.yes'),'data-off'=>__('crud.no'), 'data-size'=>'mini','data-offstyle'=>'secondary']) !!}</td>

</div>


<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', __('models/countries.fields.code').':') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/countries.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('countries.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
