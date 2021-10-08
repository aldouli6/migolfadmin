<div class="table-responsive">
    <table class="table" id="betRompeHandicaps-table">
        <thead>
            <tr>
                <th>@lang('models/betRompeHandicaps.fields.id')</th>
        <th>@lang('models/betRompeHandicaps.fields.bet_id')</th>
        <th>@lang('models/betRompeHandicaps.fields.enabled')</th>
        <th>@lang('models/betRompeHandicaps.fields.bet1_9')</th>
        <th>@lang('models/betRompeHandicaps.fields.bet10_18')</th>
        <th>@lang('models/betRompeHandicaps.fields.bet_total')</th>
        <th>@lang('models/betRompeHandicaps.fields.opcion')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($betRompeHandicaps as $betRompeHandicap)
            <tr>
                       <td>{{ $betRompeHandicap->id }}</td>
            <td>{{ $betRompeHandicap->bet_id }}</td>
            <td>{{ $betRompeHandicap->enabled }}</td>
            <td>{{ $betRompeHandicap->bet1_9 }}</td>
            <td>{{ $betRompeHandicap->bet10_18 }}</td>
            <td>{{ $betRompeHandicap->bet_total }}</td>
            <td>{{ $betRompeHandicap->opcion }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['betRompeHandicaps.destroy', $betRompeHandicap->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('betRompeHandicaps.show', [$betRompeHandicap->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('betRompeHandicaps.edit', [$betRompeHandicap->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
