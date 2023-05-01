<div class="container pb-5">
    <nav class="navbar bg-body-tertiary sticky-top">
        <div class="container-fluid">
            <a href="{{ url('/') }}" class="navbar-brand col-md-6">
                <img src="{{-- asset('assets/svg/store-svgrepo-com.svg') --}}" alt="logo" width="60" height="60">
                <span class="fs-4">MiBIB</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <img src="{{-- asset('assets/svg/store-svgrepo-com.svg') --}}" alt="logo" width="60" height="60">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MiBIB</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/') }}"><i class="bi bi-shop-window"></i> Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#{{-- url('/libros') --}}"><i class="bi bi-journal-bookmark"></i> Libros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-journal-bookmark"></i> Préstamos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/autores') }}"><i class="bi bi-journal-bookmark"></i> Autores</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
