<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    @include('layouts.nav')
</nav>
<div id="layoutSidenav">
    @include('layouts.sidebar')
    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>
        @include('layouts.footer')
    </div>
</div>
@include(('layouts.script'))

</body>
</html>
