<!-- Stored in resources/views/layouts/master.blade.php -->

<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            A.This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>