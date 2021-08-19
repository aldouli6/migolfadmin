<div class="table-responsive">
    <table class="table" id="userHoleRaitings-table">
        <thead>
            <tr>
                <th>@lang('models/userHoleRaitings.fields.id')</th>
        <th>@lang('models/userHoleRaitings.fields.player_id')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($userHoleRaitings as $userHoleRaiting)
            <tr>
                       <td>{{ $userHoleRaiting->id }}</td>
            <td>{{ $userHoleRaiting->player_id }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['userHoleRaitings.destroy', $userHoleRaiting->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('userHoleRaitings.show', [$userHoleRaiting->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('userHoleRaitings.edit', [$userHoleRaiting->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
