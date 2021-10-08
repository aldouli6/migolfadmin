<div class="table-responsive">
    <table class="table" id="bets-table">
        <thead>
            <tr>
                <th>@lang('models/bets.fields.id')</th>
        <th>@lang('models/bets.fields.user_id')</th>
        <th>@lang('models/bets.fields.name')</th>
        <th>@lang('models/bets.fields.classification')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($bets as $bet)
            <tr>
                       <td>{{ $bet->id }}</td>
            <td>{{ $bet->user_id }}</td>
            <td>{{ $bet->name }}</td>
            <td>{{ $bet->classification }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['bets.destroy', $bet->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('bets.show', [$bet->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('bets.edit', [$bet->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
