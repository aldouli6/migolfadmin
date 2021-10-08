<div class="table-responsive">
    <table class="table" id="betRayaPuntos-table">
        <thead>
            <tr>
                <th>@lang('models/betRayaPuntos.fields.id')</th>
        <th>@lang('models/betRayaPuntos.fields.bet_id')</th>
        <th>@lang('models/betRayaPuntos.fields.enabled')</th>
        <th>@lang('models/betRayaPuntos.fields.bet')</th>
        <th>@lang('models/betRayaPuntos.fields.birdie')</th>
        <th>@lang('models/betRayaPuntos.fields.aguila')</th>
        <th>@lang('models/betRayaPuntos.fields.albatros')</th>
        <th>@lang('models/betRayaPuntos.fields.hoyo_uno')</th>
        <th>@lang('models/betRayaPuntos.fields.exceso')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($betRayaPuntos as $betRayaPunto)
            <tr>
                       <td>{{ $betRayaPunto->id }}</td>
            <td>{{ $betRayaPunto->bet_id }}</td>
            <td>{{ $betRayaPunto->enabled }}</td>
            <td>{{ $betRayaPunto->bet }}</td>
            <td>{{ $betRayaPunto->birdie }}</td>
            <td>{{ $betRayaPunto->aguila }}</td>
            <td>{{ $betRayaPunto->albatros }}</td>
            <td>{{ $betRayaPunto->hoyo_uno }}</td>
            <td>{{ $betRayaPunto->exceso }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['betRayaPuntos.destroy', $betRayaPunto->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('betRayaPuntos.show', [$betRayaPunto->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('betRayaPuntos.edit', [$betRayaPunto->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
