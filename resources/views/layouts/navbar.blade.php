<div class="container d-flex align-items-center justify-content-between">

    <a href={{ route('homepage') }}>
        <img src="logo.png" width="200px" alt="" srcset="">
    </a>
    <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link active" href="{{ route('homepage') }}">Home</a></li>
            <li><a class="nav-link" href="{{ route('about-us') }}">Tentang Kami</a></li>
            <li><a class="nav-link" href="{{ route('denizens.dues') }}">Iuran Warga</a></li>
            <li><a class="nav-link" href="{{ route('denizens.finances') }}">Laporan Keuangan</a></li>
            <li><a class="nav-link" href="{{ route('denizens.activities') }}">Kegiatan warga</a></li>
            @if (!Auth::guest())
                <li><a class="getstarted" href="{{ route('dashboard.home') }}">Hi,
                        {{ auth()->user()->name }}</a></li>
            @else
                <li><a class="getstarted" href="{{ route('login') }}">Login</a></li>
            @endif

        </ul> <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>


</div>
