<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header')
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        @include('layouts.navbar')
    </header><!-- End Header -->

    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer">

        @include('layouts.footer')
    </footer><!-- End Footer -->

    @include('layouts.utils')

</body>

</html>
