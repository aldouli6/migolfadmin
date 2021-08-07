<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>
<li class="{{ Request::is('countries*') ? 'active' : '' }}">
    <a href="{{ route('countries.index') }}"><i class="fa fa-edit"></i><span>@lang('models/countries.plural')</span></a>
</li>

<li class="{{ Request::is('states*') ? 'active' : '' }}">
    <a href="{{ route('states.index') }}"><i class="fa fa-edit"></i><span>@lang('models/states.plural')</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{{ route('roles.index') }}"><i class="fa fa-edit"></i><span>@lang('models/roles.plural')</span></a>
</li>

<li class="{{ Request::is('clubs*') ? 'active' : '' }}">
    <a href="{{ route('clubs.index') }}"><i class="fa fa-edit"></i><span>@lang('models/clubs.plural')</span></a>
</li>


<li class="{{ Request::is('fields*') ? 'active' : '' }}">
    <a href="{{ route('fields.index') }}"><i class="fa fa-edit"></i><span>@lang('models/fields.plural')</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>@lang('models/users.plural')</span></a>
</li>

<li class="{{ Request::is('startColors*') ? 'active' : '' }}">
    <a href="{{ route('startColors.index') }}"><i class="fa fa-edit"></i><span>@lang('models/startColors.plural')</span></a>
</li>


<li class="{{ Request::is('starts*') ? 'active' : '' }}">
    <a href="{{ route('starts.index') }}"><i class="fa fa-edit"></i><span>@lang('models/starts.plural')</span></a>
</li>



<li class="{{ Request::is('holes*') ? 'active' : '' }}">
    <a href="{{ route('holes.index') }}"><i class="fa fa-edit"></i><span>@lang('models/holes.plural')</span></a>
</li>

<li class="{{ Request::is('fieldStartDefaults*') ? 'active' : '' }}">
    <a href="{{ route('fieldStartDefaults.index') }}"><i class="fa fa-edit"></i><span>@lang('models/fieldStartDefaults.plural')</span></a>
</li>


<li class="{{ Request::is('userClubs*') ? 'active' : '' }}">
    <a href="{{ route('userClubs.index') }}"><i class="fa fa-edit"></i><span>@lang('models/userClubs.plural')</span></a>
</li>









<li class="{{ Request::is('userPlayers*') ? 'active' : '' }}">
    <a href="{{ route('userPlayers.index') }}"><i class="fa fa-edit"></i><span>@lang('models/userPlayers.plural')</span></a>
</li>

<li class="{{ Request::is('userFields*') ? 'active' : '' }}">
    <a href="{{ route('userFields.index') }}"><i class="fa fa-edit"></i><span>@lang('models/userFields.plural')</span></a>
</li>

<li class="{{ Request::is('userPlayers*') ? 'active' : '' }}">
    <a href="{{ route('userPlayers.index') }}"><i class="fa fa-edit"></i><span>@lang('models/userPlayers.plural')</span></a>
</li>

