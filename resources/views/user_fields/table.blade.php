<div class="table-responsive">
    <table class="table" id="userFields-table">
        <thead>
            <tr>
                <th>@lang('models/userFields.fields.id')</th>
        <th>@lang('models/userFields.fields.user_id')</th>
        <th>@lang('models/userFields.fields.field_id')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($userFields as $userField)
            <tr>
                       <td>{{ $userField->id }}</td>
            <td>{{ $userField->user_id }}</td>
            <td>{{ $userField->field_id }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['userFields.destroy', $userField->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('userFields.show', [$userField->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('userFields.edit', [$userField->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
