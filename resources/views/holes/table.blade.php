<div class="table-responsive">
    <table class="table" id="holes-table">
        <thead>
            <tr>
                <th>@lang('models/holes.fields.id')</th>
        <th>@lang('models/holes.fields.hole_number')</th>
        <th>@lang('models/holes.fields.course_id')</th>
        <th>@lang('models/holes.fields.par')</th>
        <th>@lang('models/holes.fields.hole_raiting_male')</th>
        <th>@lang('models/holes.fields.hole_raiting_female')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($holes as $hole)
            <tr>
                       <td>{{ $hole->id }}</td>
            <td>{{ $hole->hole_number }}</td>
            <td>{{ $courseItems[ $hole->course_id]}}</td>
            <td>{{ $hole->par }}</td>
            <td>{{ $hole->hole_raiting_male }}</td>
            <td>{{ $hole->hole_raiting_female }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['holes.destroy', $hole->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('holes.show', [$hole->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('holes.edit', [$hole->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
