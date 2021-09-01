<div class="table-responsive">
    <table class="table" id="clubs-table">
        <thead>
            <tr>
                <th>@lang('models/clubs.fields.id')</th>
        <th>@lang('models/clubs.fields.enabled')</th>
        <th>@lang('models/clubs.fields.name')</th>
        <th>@lang('models/clubs.fields.country_id')</th>
        <th>@lang('models/clubs.fields.state_id')</th>
        <th>@lang('models/clubs.fields.city')</th>
                <th >@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clubs as $club)
            <tr>
            <td>{{ $club->id }}</td>
            <td>{!! Form::checkbox('enabled', 1, $club->enabled,  ['class' => 'toggle','number'=>$club->id,'data-toggle' => 'toggle','data-on'=>__('crud.yes'),'data-off'=>__('crud.no'), 'data-size'=>'mini','data-offstyle'=>'secondary']) !!}</td>
            <td>{{ $club->name }}</td>
            <td>{{ $countryItems[$club->country_id] ?? '' }}</td>
            <td>{{ $stateItems[$club->state_id] ?? '' }}</td>
            <td>{{ $club->city }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['clubs.destroy', $club->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('clubs.show', [$club->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('clubs.edit', [$club->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
