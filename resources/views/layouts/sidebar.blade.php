<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
    <a href="{{ url('/home') }}">
    <div>
    <img class="navbar-brand-full app-header-logo" src="{{ asset('public/logos/pp.jpg') }}" width="45"
             alt="MiGolf">
        <span>Mi Golf</span>
    </div>
       
    </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('public/logos/pp.jpg') }}" width="45px" alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu')
    </ul>
</aside>
