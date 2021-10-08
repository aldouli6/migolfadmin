<div class="table-responsive">
    <table class="table" id="betMatchParejas-table">
        <thead>
            <tr>
                <th>@lang('models/betMatchParejas.fields.id')</th>
        <th>@lang('models/betMatchParejas.fields.bet_id')</th>
        <th>@lang('models/betMatchParejas.fields.enabled')</th>
        <th>@lang('models/betMatchParejas.fields.bet1_9')</th>
        <th>@lang('models/betMatchParejas.fields.bet10_18')</th>
        <th>@lang('models/betMatchParejas.fields.bet_total')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($betMatchParejas as $betMatchPareja)
            <tr>
                       <td>{{ $betMatchPareja->id }}</td>
            <td>{{ $betMatchPareja->bet_id }}</td>
            <td>{{ $betMatchPareja->enabled }}</td>
            <td>{{ $betMatchPareja->bet1_9 }}</td>
            <td>{{ $betMatchPareja->bet10_18 }}</td>
            <td>{{ $betMatchPareja->bet_total }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['betMatchParejas.destroy', $betMatchPareja->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('betMatchParejas.show', [$betMatchPareja->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('betMatchParejas.edit', [$betMatchPareja->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
