<div class="table-responsive">
    <table class="table" id="countries-table">
        <thead>
            <tr>
                <th>@lang('models/countries.fields.id')</th>
        <th>@lang('models/countries.fields.enabled')</th>
        <th>@lang('models/countries.fields.code')</th>
        <th>@lang('models/countries.fields.name')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($countries as $country)
            <tr>
                       <td>{{ $country->id }}</td>
            <td>{{ $country->enabled }}</td>
            <td>{{ $country->code }}</td>
            <td>{{ $country->name }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['countries.destroy', $country->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('countries.show', [$country->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('countries.edit', [$country->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
