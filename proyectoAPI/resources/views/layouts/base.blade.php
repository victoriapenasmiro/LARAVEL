<!DOCTYPE html>
<html lang="en">
@extends('layouts.head')

<body>

    <div class="container pt-5">
        @yield('idiomas')

        @yield('content')
        @include('layouts.footer')

    </div>
    <script src="/js/apirest.js"></script>
</body>

</html>
