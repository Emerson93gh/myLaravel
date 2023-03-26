<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 10 - {{ $title ?? '' }} </title>
    <meta name="description" content="{{$metaDescription ?? 'Default meta description'}})">
    {{-- <link rel="icon" href="{{asset('favicon.ico')}}"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- @include('partials.navigation') --}}
    <x-layouts.navigation />

    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif

    {{ $slot }}

</body>
</html>
