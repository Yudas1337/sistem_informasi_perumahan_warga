<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="nav-item {{ request()->routeIs('dashboard.home') ? 'active' : '' }}"><a class="d-flex align-items-center"
            href="{{ route('dashboard.home') }}">
            <i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span></a>
    </li>
    <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Main Menu</span><i
            data-feather="more-horizontal"></i>
    </li>
    @can('manage-for-villagehead')
        <li class="nav-item {{ request()->routeIs('manage-admins.*') ? 'active' : '' }}"><a
                class="d-flex align-items-center" href="{{ route('manage-admins.index') }}"><i
                    data-feather="user"></i><span class="menu-title text-truncate" data-i18n="User">Data Admin</span></a>
        </li>
        <li class="nav-item {{ request()->routeIs('manage-residences.*') ? 'active' : '' }}"><a
                class="d-flex align-items-center" href="{{ route('manage-residences.index') }}">
                <i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Data
                    Perumahan</span></a>
        </li>
    @endcan


</ul>
