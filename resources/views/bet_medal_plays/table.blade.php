<div class="table-responsive">
    <table class="table" id="betMedalPlays-table">
        <thead>
            <tr>
                <th>@lang('models/betMedalPlays.fields.id')</th>
        <th>@lang('models/betMedalPlays.fields.bet_id')</th>
        <th>@lang('models/betMedalPlays.fields.enabled')</th>
        <th>@lang('models/betMedalPlays.fields.bet1_9')</th>
        <th>@lang('models/betMedalPlays.fields.bet10_18')</th>
        <th>@lang('models/betMedalPlays.fields.bet_total')</th>
        <th>@lang('models/betMedalPlays.fields.empate')</th>
                <th  >@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($betMedalPlays as $betMedalPlay)
            <tr>
                       <td>{{ $betMedalPlay->id }}</td>
            <td>{{ $betMedalPlay->bet_id }}</td>
            <td>{{ $betMedalPlay->enabled }}</td>
            <td>{{ $betMedalPlay->bet1_9 }}</td>
            <td>{{ $betMedalPlay->bet10_18 }}</td>
            <td>{{ $betMedalPlay->bet_total }}</td>
            <td>{{ $betMedalPlay->empate }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['betMedalPlays.destroy', $betMedalPlay->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('betMedalPlays.show', [$betMedalPlay->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('betMedalPlays.edit', [$betMedalPlay->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
