<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/userCourses.fields.id').':') !!}
    <p>{{ $userCourse->id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/userCourses.fields.user_id').':') !!}
    <p>{{ $userItems[$userCourse->user_id] ?? '' }}</p>
</div>

<!-- Course Id Field -->
<div class="form-group">
    {!! Form::label('course_id', __('models/userCourses.fields.course_id').':') !!}
    <p>{{ $courseItems[$userCourse->course_id] ?? '' }}</p>
</div>

<!-- Classification Field -->
<div class="form-group">
    {!! Form::label('classification', __('models/userCourses.fields.classification').':') !!}
    <p>@lang('models/userCourses.fields.0'.$userCourse->classification  )</p>
</div>

<!-- Tee Default Male Field -->
<div class="form-group">
    {!! Form::label('tee_default_male', __('models/userCourses.fields.tee_default_male').':') !!}
    <p>{{ $teesMales[$userCourse->tee_default_male] ?? '' }}</p>
</div>

<!-- Tee Default Female Field -->
<div class="form-group">
    {!! Form::label('tee_default_female', __('models/userCourses.fields.tee_default_female').':') !!}
    <p>{{ $teesFemales[$userCourse->tee_default_female] ?? '' }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/userCourses.fields.created_at').':') !!}
    <p>{{ $userCourse->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/userCourses.fields.updated_at').':') !!}
    <p>{{ $userCourse->updated_at }}</p>
</div>

