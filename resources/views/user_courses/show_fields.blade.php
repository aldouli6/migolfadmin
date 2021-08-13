<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/userCourses.fields.id').':') !!}
    <p>{{ $userCourse->id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/userCourses.fields.user_id').':') !!}
    <p>{{ $userCourse->user_id }}</p>
</div>

<!-- Course Id Field -->
<div class="form-group">
    {!! Form::label('course_id', __('models/userCourses.fields.course_id').':') !!}
    <p>{{ $userCourse->course_id }}</p>
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

