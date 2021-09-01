<div class="table-responsive">
    <table class="table" id="teeColors-table">
        <thead>
            <tr>
                <th>@lang('models/teeColors.fields.id')</th>
        <th>@lang('models/teeColors.fields.name')</th>
        <th>@lang('models/teeColors.fields.color')</th>
                <th >@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($teeColors as $teeColor)
            <tr>
                       <td>{{ $teeColor->id }}</td>
            <td>{{ $teeColor->name }}</td>
            <td>{{ $teeColor->color }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['teeColors.destroy', $teeColor->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('teeColors.show', [$teeColor->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('teeColors.edit', [$teeColor->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
