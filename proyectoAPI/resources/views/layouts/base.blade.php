<!DOCTYPE html>
<html lang="en">
@extends('layouts.head')

<body>

    <div class="container pt-5">
        @yield('idiomas')

        @yield('content')
        @include('layouts.footer')

    </div>
    <script src="http://localhost/LARAVEL/proyectoAPI/public/js/apirest.js"></script>
</body>

</html>
