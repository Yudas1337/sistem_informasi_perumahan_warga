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

    @can('manage-for-administrator')
        <li class="nav-item {{ request()->routeIs('manage-denizen.*') ? 'active' : '' }}"><a
                class="d-flex align-items-center" href="{{ route('manage-admins.index') }}"><i
                    data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Data Warga">Data
                    Warga</span></a>
        </li>
        <li class="nav-item {{ request()->routeIs('manage-activities.*') ? 'active' : '' }}"><a
                class="d-flex align-items-center" href="{{ route('manage-activities.index') }}">
                <i data-feather="calendar"></i><span class="menu-title text-truncate" data-i18n="Data Kegiatan">Data
                    Kegiatan</span></a>
        </li>
        <li class="nav-item {{ request()->routeIs('manage-finances.*') ? 'active' : '' }}"><a
                class="d-flex align-items-center" href="{{ route('manage-finances.index') }}">
                <i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Laporan Keuangan">Laporan
                    Keuangan</span></a>
        </li>
        <li class="nav-item {{ request()->routeIs('manage-residences.*') ? 'active' : '' }}"><a
                class="d-flex align-items-center" href="{{ route('manage-residences.index') }}">
                <i data-feather="dollar-sign"></i><span class="menu-title text-truncate" data-i18n="Data Iuran">Iuran
                    Warga</span></a>
        </li>
    @endcan

</ul>
