<div class="table-responsive">
    <table class="table" id="userScores-table">
        <thead>
            <tr>
                <th>@lang('models/userScores.fields.id')</th>
        <th>@lang('models/userScores.fields.player_id')</th>
        <th>@lang('models/userScores.fields.handicap_index')</th>
        <th>@lang('models/userScores.fields.ghin')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($userScores as $userScore)
            <tr>
                       <td>{{ $userScore->id }}</td>
            <td>{{ $userScore->player_id }}</td>
            <td>{{ $userScore->handicap_index }}</td>
            <td>{{ $userScore->ghin }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['userScores.destroy', $userScore->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('userScores.show', [$userScore->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('userScores.edit', [$userScore->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
