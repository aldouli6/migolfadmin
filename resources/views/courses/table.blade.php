<div class="table-responsive">
    <table class="table" id="courses-table">
        <thead>
            <tr>
                <th>@lang('models/courses.fields.id')</th>
        <th>@lang('models/courses.fields.description')</th>
        <th>@lang('models/courses.fields.alias')</th>
        <th>@lang('models/courses.fields.club_id')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                       <td>{{ $course->id }}</td>
            <td>{{ $course->description }}</td>
            <td>{{ $course->alias }}</td>
            <td>{{ $course->club_id }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['courses.destroy', $course->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('courses.show', [$course->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('courses.edit', [$course->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
