<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="{{ url('assets/img/favicon.ico') }}">
    <title>@yield('title', 'Gestor | CV ALUMNOS')</title>

    {{-- Bootstrap y fuentes --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/css/styles.css') }}">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* === NAVBAR === */
        nav.navbar {
            background-color: #1f1f1f;
            box-shadow: 0 2px 8px rgba(0,0,0,0.6);
        }

        nav.navbar .navbar-brand {
            color: #0d6efd !important;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        nav.navbar .nav-link {
            color: #e0e0e0 !important;
            transition: color 0.3s;
        }

        nav.navbar .nav-link:hover,
        nav.navbar .nav-link.active {
            color: #0d6efd !important;
        }

        .navbar-toggler {
            border-color: #555;
        }

        .navbar-toggler-icon {
            filter: invert(1);
        }

        /* === MAIN === */
        main.container {
            background: #1a1a1a;
            border-radius: 10px;
            padding: 2rem;
            margin-top: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.5);
        }

        h1, h2, h3, h4 {
            color: #fff;
        }

        /* === BOTONES === */
        .btn-outline-success {
            border-radius: 30px;
            border-color: #0d6efd;
            color: #0d6efd;
            transition: 0.3s;
        }

        .btn-outline-success:hover {
            background-color: #0d6efd;
            color: #fff;
        }

        /* === ALERTAS === */
        .alert {
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.3);
        }

        .alert-success {
            background-color: #1e2a1f;
            color: #9be59b;
        }

        .alert-danger {
            background-color: #2b1a1a;
            color: #ff8c8c;
        }

        /* === FOOTER === */
        footer {
            background-color: #1f1f1f;
            color: #888;
            font-size: 0.9rem;
            text-align: center;
            padding: 1.5rem 0;
            margin-top: auto;
            border-top: 1px solid #2c2c2c;
        }

        footer a {
            color: #0d6efd;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* === BUSCADOR (ahora en la parte superior del main) === */
        .search-bar {
            background: #2a2a2a;
            border-radius: 10px;
            padding: 1rem 1.5rem;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .search-bar input {
            background: #1f1f1f;
            border: 1px solid #444;
            color: #e0e0e0;
            border-radius: 30px;
            padding: 0.5rem 1rem;
            width: 250px;
        }

        .search-bar input::placeholder {
            color: #aaa;
        }
    </style>
</head>

<body>
    {{-- NAVBAR SUPERIOR --}}
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                @yield('navbar', 'Gestor | CV ALUMNOS')
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarMenu" aria-controls="navbarMenu" 
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">Sobre la app</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('alumno.create') }}">Añadir alumno</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Alumnos
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="{{ route('alumno.index') }}">Listado de alumnos</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('alumno.create') }}">Añadir nuevo</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- CONTENIDO PRINCIPAL --}}
    <main class="container">
        {{-- Barra de búsqueda reubicada --}}
        <div class="search-bar">
            <form class="d-flex flex-wrap gap-2 w-100 justify-content-center justify-content-md-between" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar alumno..." aria-label="Buscar">
                <button class="btn btn-outline-success px-4" type="submit">Buscar</button>
            </form>
        </div>

        {{-- Mensajes de sesión y errores --}}
        @if(session('mensajeTexto'))
            <div class="alert alert-success">{{ session('mensajeTexto') }}</div>
        @endif

        @error('mensajeTexto')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- Contenido dinámico --}}
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer>
        <div class="container">
            &copy; {{ date('Y') }} <strong>Gestor de Alumnos</strong> — 
            <a href="{{ route('about') }}">Acerca de</a>
        </div>
    </footer>

    {{-- JS --}}
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="{{ url('assets/js/main.js') }}"></script>
</body>
</html>
