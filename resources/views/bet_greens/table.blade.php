<div class="table-responsive">
    <table class="table" id="betGreens-table">
        <thead>
            <tr>
                <th>@lang('models/betGreens.fields.id')</th>
        <th>@lang('models/betGreens.fields.bet_id')</th>
        <th>@lang('models/betGreens.fields.enabled')</th>
        <th>@lang('models/betGreens.fields.bet')</th>
        <th>@lang('models/betGreens.fields.condicion1')</th>
        <th>@lang('models/betGreens.fields.condicion2')</th>
                <th  >@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($betGreens as $betGreen)
            <tr>
                       <td>{{ $betGreen->id }}</td>
            <td>{{ $betGreen->bet_id }}</td>
            <td>{{ $betGreen->enabled }}</td>
            <td>{{ $betGreen->bet }}</td>
            <td>{{ $betGreen->condicion1 }}</td>
            <td>{{ $betGreen->condicion2 }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['betGreens.destroy', $betGreen->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('betGreens.show', [$betGreen->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('betGreens.edit', [$betGreen->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
