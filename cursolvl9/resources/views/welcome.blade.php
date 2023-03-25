{{-- @extends('layouts.app')

@section('title', 'Home')
@section('meta-description', 'Home meta description')

@section('content')
    <h1>Inicio</h1>
@endsection --}}

{{-- @component('components.layout')
    <h1>Inicio</h1>
@endcomponent --}}

{{-- Otra forma --}}
<x-layouts.app
title="Home"
meta-description="Home meta description">

    <h1>Inicio</h1>
</x-layouts.app>
