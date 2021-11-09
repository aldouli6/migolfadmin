<div class="table-responsive">
    <table class="table" id="betMatchIndividuals-table">
        <thead>
            <tr>
                <th>@lang('models/betMatchIndividuals.fields.id')</th>
        <th>@lang('models/betMatchIndividuals.fields.bet_id')</th>
        <th>@lang('models/betMatchIndividuals.fields.enabled')</th>
        <th>@lang('models/betMatchIndividuals.fields.bet1_9')</th>
        <th>@lang('models/betMatchIndividuals.fields.bet10_18')</th>
        <th>@lang('models/betMatchIndividuals.fields.bet_total')</th>
                <th  >@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($betMatchIndividuals as $betMatchIndividual)
            <tr>
                       <td>{{ $betMatchIndividual->id }}</td>
            <td>{{ $betMatchIndividual->bet_id }}</td>
            <td>{{ $betMatchIndividual->enabled }}</td>
            <td>{{ $betMatchIndividual->bet1_9 }}</td>
            <td>{{ $betMatchIndividual->bet10_18 }}</td>
            <td>{{ $betMatchIndividual->bet_total }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['betMatchIndividuals.destroy', $betMatchIndividual->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('betMatchIndividuals.show', [$betMatchIndividual->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('betMatchIndividuals.edit', [$betMatchIndividual->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
