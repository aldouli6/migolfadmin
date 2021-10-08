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

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>@lang('models/users.plural')</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{{ route('roles.index') }}"><i class="fa fa-edit"></i><span>@lang('models/roles.plural')</span></a>
</li>

<li class="{{ Request::is('clubs*') ? 'active' : '' }}">
    <a href="{{ route('clubs.index') }}"><i class="fa fa-edit"></i><span>@lang('models/clubs.plural')</span></a>
</li>

<li class="{{ Request::is('courses*') ? 'active' : '' }}">
    <a href="{{ route('courses.index') }}"><i class="fa fa-edit"></i><span>@lang('models/courses.plural')</span></a>
</li>

<li class="{{ Request::is('teeColors*') ? 'active' : '' }}">
    <a href="{{ route('teeColors.index') }}"><i class="fa fa-edit"></i><span>@lang('models/teeColors.plural')</span></a>
</li>

<li class="{{ Request::is('tees*') ? 'active' : '' }}">
    <a href="{{ route('tees.index') }}"><i class="fa fa-edit"></i><span>@lang('models/tees.plural')</span></a>
</li>

<li class="{{ Request::is('courseTeeDefaults*') ? 'active' : '' }}">
    <a href="{{ route('courseTeeDefaults.index') }}"><i class="fa fa-edit"></i><span>@lang('models/courseTeeDefaults.plural')</span></a>
</li>

<li class="{{ Request::is('holes*') ? 'active' : '' }}">
    <a href="{{ route('holes.index') }}"><i class="fa fa-edit"></i><span>@lang('models/holes.plural')</span></a>
</li>

<li class="{{ Request::is('userClubs*') ? 'active' : '' }}">
    <a href="{{ route('userClubs.index') }}"><i class="fa fa-edit"></i><span>@lang('models/userClubs.plural')</span></a>
</li>

<li class="{{ Request::is('userCourses*') ? 'active' : '' }}">
    <a href="{{ route('userCourses.index') }}"><i class="fa fa-edit"></i><span>@lang('models/userCourses.plural')</span></a>
</li>

<li class="{{ Request::is('userPlayers*') ? 'active' : '' }}">
    <a href="{{ route('userPlayers.index') }}"><i class="fa fa-edit"></i><span>@lang('models/userPlayers.plural')</span></a>
</li>

<li class="{{ Request::is('userHandicapIndices*') ? 'active' : '' }}">
    <a href="{{ route('userHandicapIndices.index') }}"><i class="fa fa-edit"></i><span>@lang('models/userHandicapIndices.plural')</span></a>
</li>

<li class="{{ Request::is('userHoleRaitings*') ? 'active' : '' }}">
    <a href="{{ route('userHoleRaitings.index') }}"><i class="fa fa-edit"></i><span>@lang('models/userHoleRaitings.plural')</span></a>
</li>


<li class="{{ Request::is('userGroups*') ? 'active' : '' }}">
    <a href="{{ route('userGroups.index') }}"><i class="fa fa-edit"></i><span>@lang('models/userGroups.plural')</span></a>
</li>

<li class="{{ Request::is('bets*') ? 'active' : '' }}">
    <a href="{{ route('bets.index') }}"><i class="fa fa-edit"></i><span>@lang('models/bets.plural')</span></a>
</li>

<li class="{{ Request::is('betMatchIndividuals*') ? 'active' : '' }}">
    <a href="{{ route('betMatchIndividuals.index') }}"><i class="fa fa-edit"></i><span>@lang('models/betMatchIndividuals.plural')</span></a>
</li>

<li class="{{ Request::is('betMedalPlays*') ? 'active' : '' }}">
    <a href="{{ route('betMedalPlays.index') }}"><i class="fa fa-edit"></i><span>@lang('models/betMedalPlays.plural')</span></a>
</li>

<li class="{{ Request::is('betStablefords*') ? 'active' : '' }}">
    <a href="{{ route('betStablefords.index') }}"><i class="fa fa-edit"></i><span>@lang('models/betStablefords.plural')</span></a>
</li>

<li class="{{ Request::is('betRompeHandicaps*') ? 'active' : '' }}">
    <a href="{{ route('betRompeHandicaps.index') }}"><i class="fa fa-edit"></i><span>@lang('models/betRompeHandicaps.plural')</span></a>
</li>

<li class="{{ Request::is('betMatchParejas*') ? 'active' : '' }}">
    <a href="{{ route('betMatchParejas.index') }}"><i class="fa fa-edit"></i><span>@lang('models/betMatchParejas.plural')</span></a>
</li>

<li class="{{ Request::is('betSkins*') ? 'active' : '' }}">
    <a href="{{ route('betSkins.index') }}"><i class="fa fa-edit"></i><span>@lang('models/betSkins.plural')</span></a>
</li>

<li class="{{ Request::is('betGreens*') ? 'active' : '' }}">
    <a href="{{ route('betGreens.index') }}"><i class="fa fa-edit"></i><span>@lang('models/betGreens.plural')</span></a>
</li>

<li class="{{ Request::is('betRayaPuntos*') ? 'active' : '' }}">
    <a href="{{ route('betRayaPuntos.index') }}"><i class="fa fa-edit"></i><span>@lang('models/betRayaPuntos.plural')</span></a>
</li>

