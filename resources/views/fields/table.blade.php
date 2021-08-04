<div class="table-responsive">
    <table class="table" id="fields-table">
        <thead>
            <tr>
                <th>@lang('models/fields.fields.id')</th>
        <th>@lang('models/fields.fields.description')</th>
        <th>@lang('models/fields.fields.alias')</th>
        <th>@lang('models/fields.fields.club_id')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($fields as $field)
            <tr>
                       <td>{{ $field->id }}</td>
            <td>{{ $field->description }}</td>
            <td>{{ $field->alias }}</td>
            <td>{{ $field->club_id }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['fields.destroy', $field->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('fields.show', [$field->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('fields.edit', [$field->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
