<!-- 'bootstrap / Toggle Switch Enabled Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('enabled', __('models/tees.fields.enabled').':') !!}
    {!! Form::hidden('enabled', 0) !!}
    {!! Form::checkbox('enabled',1, 1,   ['data-toggle' => 'toggle','data-on'=>__('crud.yes'),'data-off'=>__('crud.no'), 'data-size'=>'mini','data-offstyle'=>'secondary']) !!}</td>

</div>


<!-- Course Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course_id', __('models/tees.fields.course_id').':') !!}
    {!! Form::select('course_id', $courseItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', __('models/tees.fields.gender').':') !!}
    {!! Form::select('gender', ['F' => 'Female', 'M' => 'Male'], null, ['class' => 'form-control']) !!}
</div>

<!-- Teecolor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('teecolor_id', __('models/tees.fields.teecolor_id').':') !!}
    {!! Form::select('teecolor_id', $tee_colorItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Slope Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slope', __('models/tees.fields.slope').':') !!}
    {!! Form::number('slope', null, ['class' => 'form-control']) !!}
</div>

<!-- Rating Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rating', __('models/tees.fields.rating').':') !!}
    {!! Form::number('rating', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('tees.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
