<div class="table-responsive">
    <table class="table" id="states-table">
        <thead>
            <tr>
                <th>@lang('models/states.fields.id')</th>
        <th>@lang('models/states.fields.country_id')</th>
        <th>@lang('models/states.fields.code')</th>
        <th>@lang('models/states.fields.name')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($states as $state)
            <tr>
                       <td>{{ $state->id }}</td>
            <td>{{ $state->country_id }}</td>
            <td>{{ $state->code }}</td>
            <td>{{ $state->name }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['states.destroy', $state->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('states.show', [$state->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('states.edit', [$state->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
