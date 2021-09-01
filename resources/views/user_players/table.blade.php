<div class="table-responsive">
    <table class="table" id="userPlayers-table">
        <thead>
            <tr>
                <th>@lang('models/userPlayers.fields.id')</th>
        <th>@lang('models/userPlayers.fields.user_id')</th>
        <th>@lang('models/userPlayers.fields.player_id')</th>
        <th>@lang('models/userPlayers.fields.frequency')</th>
        <th>@lang('models/userPlayers.fields.course_id')</th>
        <th>@lang('models/userPlayers.fields.tee_id')</th>
                <th >@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($userPlayers as $userPlayer)
            <tr>
                       <td>{{ $userPlayer->id }}</td>

            <td>{{ $userItems[$userPlayer->user_id] ?? '' }}</td> 
            <td>{{ $userItems[$userPlayer->player_id] ?? '' }}</td> 
            <td> @lang('models/userPlayers.fields.'.$userPlayer->frequency  )</td>
            <td>{{ $courseItems[$userPlayer->course_id] ?? '' }}</td> 
            <td>{{  $tee_colorItems[ $teeItems[$userPlayer->tee_id]??0] ?? '' }}</td>
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
