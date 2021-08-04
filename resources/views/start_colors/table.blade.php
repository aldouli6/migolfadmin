<div class="table-responsive">
    <table class="table" id="startColors-table">
        <thead>
            <tr>
                <th>@lang('models/startColors.fields.id')</th>
        <th>@lang('models/startColors.fields.name')</th>
        <th>@lang('models/startColors.fields.icon')</th>
        <th>@lang('models/startColors.fields.leads')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($startColors as $startColor)
            <tr>
                       <td>{{ $startColor->id }}</td>
            <td>{{ $startColor->name }}</td>
            <td>{{ $startColor->icon }}</td>
            <td>{{ $startColor->leads }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['startColors.destroy', $startColor->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('startColors.show', [$startColor->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('startColors.edit', [$startColor->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
