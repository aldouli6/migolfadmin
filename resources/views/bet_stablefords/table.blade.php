<div class="table-responsive">
    <table class="table" id="betStablefords-table">
        <thead>
            <tr>
                <th>@lang('models/betStablefords.fields.id')</th>
        <th>@lang('models/betStablefords.fields.bet_id')</th>
        <th>@lang('models/betStablefords.fields.enabled')</th>
        <th>@lang('models/betStablefords.fields.bet1_9')</th>
        <th>@lang('models/betStablefords.fields.bet10_18')</th>
        <th>@lang('models/betStablefords.fields.bet_total')</th>
                <th  >@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($betStablefords as $betStableford)
            <tr>
                       <td>{{ $betStableford->id }}</td>
            <td>{{ $betStableford->bet_id }}</td>
            <td>{{ $betStableford->enabled }}</td>
            <td>{{ $betStableford->bet1_9 }}</td>
            <td>{{ $betStableford->bet10_18 }}</td>
            <td>{{ $betStableford->bet_total }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['betStablefords.destroy', $betStableford->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('betStablefords.show', [$betStableford->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('betStablefords.edit', [$betStableford->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
