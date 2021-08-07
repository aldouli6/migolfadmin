<div class="table-responsive">
    <table class="table" id="starts-table">
        <thead>
            <tr>
                <th>@lang('models/starts.fields.id')</th>
        <th>@lang('models/starts.fields.enabled')</th>
        <th>@lang('models/starts.fields.field_id')</th>
        <th>@lang('models/starts.fields.gender')</th>
        <th>@lang('models/starts.fields.startcolor_id')</th>
        <th>@lang('models/starts.fields.slope')</th>
        <th>@lang('models/starts.fields.rating')</th>
        <th>@lang('models/starts.fields.par')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($starts as $start)
            <tr>
                       <td>{{ $start->id }}</td>
            <td>{{ $start->enabled }}</td>
            <td>{{ $start->field_id }}</td>
            <td>{{ $start->gender }}</td>
            <td>{{ $start->startcolor_id }}</td>
            <td>{{ $start->slope }}</td>
            <td>{{ $start->rating }}</td>
            <td>{{ $start->par }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['starts.destroy', $start->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('starts.show', [$start->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('starts.edit', [$start->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
