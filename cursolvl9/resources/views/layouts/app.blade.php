<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 10 - @yield('title') </title>
    <meta name="description" content="@yield('meta-description', 'Default meta description')">
    {{-- <link rel="icon" href="{{asset('favicon.ico')}}"> --}}
</head>
<body>
    @include('partials.navigation')

    @yield('content')

</body>
</html>
