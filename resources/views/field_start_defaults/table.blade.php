<div class="table-responsive">
    <table class="table" id="fieldStartDefaults-table">
        <thead>
            <tr>
                <th>@lang('models/fieldStartDefaults.fields.field_id')</th>
        <th>@lang('models/fieldStartDefaults.fields.gender')</th>
        <th>@lang('models/fieldStartDefaults.fields.start_id')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($fieldStartDefaults as $fieldStartDefault)
            <tr>
                       <td>{{ $fieldStartDefault->field_id }}</td>
            <td>{{ $fieldStartDefault->gender }}</td>
            <td>{{ $fieldStartDefault->start_id }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['fieldStartDefaults.destroy', $fieldStartDefault->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('fieldStartDefaults.show', [$fieldStartDefault->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('fieldStartDefaults.edit', [$fieldStartDefault->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
