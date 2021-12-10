<!-- xxxx.blade.php para usar plantillas
    plantilla para todo el HTML que sea común en diferentes ficheros -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {{-- librería de tailwind --}}
    {{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}
    <style>
        .active {
            font-weight: 800;
            color: green;
        }

    </style>
</head>

<body>

    {{-- la ruta se calcula a partir de la carpeta 'views' --}}
    {{-- header --}}
    @include('layouts.partials.header')

    @yield('content')

    {{-- footer --}}
    @include('layouts.partials.footer')
</body>

</html>
