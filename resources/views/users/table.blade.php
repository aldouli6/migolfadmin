<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>@lang('models/users.fields.id')</th>
        <th>@lang('models/users.fields.enabled')</th>
        <th>@lang('models/users.fields.alias')</th>
        <th>@lang('models/users.fields.phone')</th>
        <th>@lang('models/users.fields.email')</th>
        <th>@lang('models/users.fields.frequency')</th>
        <th>@lang('models/users.fields.field_id')</th>
        <th>@lang('models/users.fields.role')</th>
        <th>@lang('models/users.fields.start_id')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                       <td>{{ $user->id }}</td>
            <td>{{ $user->enabled }}</td>
            <td>{{ $user->alias }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->frequency }}</td>
            <td>{{ $user->field_id }}</td>
            <td>{{ implode(' ', $user->getRoleNames()->toArray()) }}</td>
            <td>{{ $user->start_id }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
