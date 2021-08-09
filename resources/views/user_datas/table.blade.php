<div class="table-responsive">
    <table class="table" id="userDatas-table">
        <thead>
            <tr>
                <th>@lang('models/userDatas.fields.id')</th>
        <th>@lang('models/userDatas.fields.player_id')</th>
        <th>@lang('models/userDatas.fields.handicap_index')</th>
        <th>@lang('models/userDatas.fields.ghin')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($userDatas as $userData)
            <tr>
                       <td>{{ $userData->id }}</td>
            <td>{{ $userData->player_id }}</td>
            <td>{{ $userData->handicap_index }}</td>
            <td>{{ $userData->ghin }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['userDatas.destroy', $userData->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('userDatas.show', [$userData->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('userDatas.edit', [$userData->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
