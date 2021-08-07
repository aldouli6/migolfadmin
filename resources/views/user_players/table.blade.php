<div class="table-responsive">
    <table class="table" id="userPlayers-table">
        <thead>
            <tr>
                <th>@lang('models/userPlayers.fields.id')</th>
        <th>@lang('models/userPlayers.fields.user_id')</th>
        <th>@lang('models/userPlayers.fields.player_id')</th>
        <th>@lang('models/userPlayers.fields.frequency')</th>
        <th>@lang('models/userPlayers.fields.field_id')</th>
        <th>@lang('models/userPlayers.fields.start_id')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($userPlayers as $userPlayer)
            <tr>
                       <td>{{ $userPlayer->id }}</td>
            <td>{{ $userPlayer->user_id }}</td>
            <td>{{ $userPlayer->player_id }}</td>
            <td>{{ $userPlayer->frequency }}</td>
            <td>{{ $userPlayer->field_id }}</td>
            <td>{{ $userPlayer->start_id }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['userPlayers.destroy', $userPlayer->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('userPlayers.show', [$userPlayer->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('userPlayers.edit', [$userPlayer->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
