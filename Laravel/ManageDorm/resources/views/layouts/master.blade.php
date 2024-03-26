<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    @include('layouts.header')
    
    @if(Session::get('auth') == 'admin')
        @include('layouts.admin_submenu')
    @endif
    @if(Session::get('auth') != 'admin' && Session::get('auth') != null)
        @include('layouts.admin_submenu')
    @endif
    <!-- Main Content -->
    <div class="col-md-9">
        @yield('content')
    </div>
    </div>



    @include('layouts.footer')
</body>

</html>