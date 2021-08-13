<div class="table-responsive">
    <table class="table" id="tees-table">
        <thead>
            <tr>
                <th>@lang('models/tees.fields.id')</th>
        <th>@lang('models/tees.fields.enabled')</th>
        <th>@lang('models/tees.fields.course_id')</th>
        <th>@lang('models/tees.fields.gender')</th>
        <th>@lang('models/tees.fields.teecolor_id')</th>
        <th>@lang('models/tees.fields.slope')</th>
        <th>@lang('models/tees.fields.rating')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tees as $tee)
            <tr>
                       <td>{{ $tee->id }}</td>
            <td>{{ $tee->enabled }}</td>
            <td>{{ $tee->course_id }}</td>
            <td>{{ $tee->gender }}</td>
            <td>{{ $tee->teecolor_id }}</td>
            <td>{{ $tee->slope }}</td>
            <td>{{ $tee->rating }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['tees.destroy', $tee->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('tees.show', [$tee->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('tees.edit', [$tee->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
