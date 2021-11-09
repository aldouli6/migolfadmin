<div class="table-responsive">
    <table class="table" id="betSkins-table">
        <thead>
            <tr>
                <th>@lang('models/betSkins.fields.id')</th>
        <th>@lang('models/betSkins.fields.bet_id')</th>
        <th>@lang('models/betSkins.fields.enabled')</th>
        <th>@lang('models/betSkins.fields.bet')</th>
        <th>@lang('models/betSkins.fields.ventaja')</th>
                <th  >@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($betSkins as $betSkin)
            <tr>
                       <td>{{ $betSkin->id }}</td>
            <td>{{ $betSkin->bet_id }}</td>
            <td>{{ $betSkin->enabled }}</td>
            <td>{{ $betSkin->bet }}</td>
            <td>{{ $betSkin->ventaja }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['betSkins.destroy', $betSkin->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('betSkins.show', [$betSkin->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('betSkins.edit', [$betSkin->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
