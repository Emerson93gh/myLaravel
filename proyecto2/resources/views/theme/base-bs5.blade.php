<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Animals</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>
<body id="mycontent">
    <div class="bg-success p-2" style="--bs-bg-opacity: .6;">
        <x-nav-bs5 />

        @if (session('status'))
        {{-- <div class="max-w-screen-xl px-3 py-2 mx-auto font-bold text-white sm:px-6 lg:px-8 bg-emerald-500 dark:bg-emerald-700">
            {{ session('status') }}
        </div>
        <div class="alert alert-info my-5 alert-dismissible fade show" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> --}}
        <div class="alert alert-info my-5 alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        {{-- Content --}}
        <section class="full-height py-3 px-lg-5 bd-layout">
            <div class="container-xxl bd-gutter mt-3 my-md-4 bd-layout">
                @yield('content')
            </div>
        </section>
        <x-footer-bs5 />
    </div>
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>
</html>
