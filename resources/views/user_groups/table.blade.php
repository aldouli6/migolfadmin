<div class="table-responsive">
    <table class="table" id="userGroups-table">
        <thead>
            <tr>
                <th>@lang('models/userGroups.fields.id')</th>
        <th>@lang('models/userGroups.fields.user_id')</th>
        <th>@lang('models/userGroups.fields.name')</th>
        <th>@lang('models/userGroups.fields.classification')</th>
        <th>@lang('models/userGroups.fields.players')</th>
        <th >@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($userGroups as $userGroup)
            <tr>
                       <td>{{ $userGroup->id }}</td>
            <td>{{ $userGroup->user_id }}</td>
            <td>{{ $userGroup->name }}</td>
            <td>{{ $userGroup->classification }}</td>
            <td>{{ $userGroup->players }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['userGroups.destroy', $userGroup->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('userGroups.show', [$userGroup->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('userGroups.edit', [$userGroup->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
