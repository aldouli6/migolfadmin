<div class="table-responsive">
    <table class="table" id="userClubs-table">
        <thead>
            <tr>
                <th>@lang('models/userClubs.fields.id')</th>
        <th>@lang('models/userClubs.fields.user_id')</th>
        <th>@lang('models/userClubs.fields.club_id')</th>
        <th>@lang('models/userClubs.fields.classification')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($userClubs as $userClub)
            <tr>
                       <td>{{ $userClub->id }}</td>
            <td>{{ $userClub->user_id }}</td>
            <td>{{ $userClub->club_id }}</td>
            <td>{{ $userClub->classification }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['userClubs.destroy', $userClub->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('userClubs.show', [$userClub->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('userClubs.edit', [$userClub->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
