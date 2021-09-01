<div class="table-responsive">
    <table class="table" id="userHandicapIndices-table">
        <thead>
            <tr>
                <th>@lang('models/userHandicapIndices.fields.id')</th>
        <th>@lang('models/userHandicapIndices.fields.player_id')</th>
        <th>@lang('models/userHandicapIndices.fields.handicap_index')</th>
        <th>@lang('models/userHandicapIndices.fields.ghin')</th>
                <th >@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($userHandicapIndices as $userHandicapIndex)
            <tr>
                       <td>{{ $userHandicapIndex->id }}</td>
            <td>{{ $userItems[$userHandicapIndex->player_id] ?? '' }}</td>
            <td>{{ $userHandicapIndex->handicap_index }}</td>
            <td>{{ $userHandicapIndex->ghin }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['userHandicapIndices.destroy', $userHandicapIndex->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('userHandicapIndices.show', [$userHandicapIndex->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('userHandicapIndices.edit', [$userHandicapIndex->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
