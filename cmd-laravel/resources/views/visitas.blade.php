<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contador visitas página</title>
</head>
<body>
    @php

        echo $cookie_value > 0 ? "<h3>total visitas $cookie_value</h3>" : "<h3>Primera conexión!</h3>";

    @endphp
</body>
</html>