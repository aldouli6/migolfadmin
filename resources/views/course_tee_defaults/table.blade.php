<div class="table-responsive">
    <table class="table" id="courseTeeDefaults-table">
        <thead>
            <tr>
                <th>@lang('models/courseTeeDefaults.fields.course_id')</th>
        <th>@lang('models/courseTeeDefaults.fields.gender')</th>
        <th>@lang('models/courseTeeDefaults.fields.tee_id')</th>
                <th >@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($courseTeeDefaults as $courseTeeDefault)
            <tr>
            <td>{{ $courseItems[$courseTeeDefault->course_id] ?? '' }}</td> 
            <td> @lang('models/tees.fields.'.$courseTeeDefault->gender  )</td>
            <td>{{  $teeItems[$courseTeeDefault->tee_id] ?? '' }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['courseTeeDefaults.destroy', $courseTeeDefault->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('courseTeeDefaults.show', [$courseTeeDefault->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('courseTeeDefaults.edit', [$courseTeeDefault->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
