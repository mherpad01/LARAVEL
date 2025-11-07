<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>@yield('title', 'Gestor de CV | Alumnos')</title>
  </head>
  <body class="min-h-full bg-gray-100">
    <div class="min-h-full">
      <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
              <div class="shrink-0">
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                  alt="Logo" class="size-8" />
              </div>
              <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                  <a href="{{ url('/') }}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Inicio</a>
                  <a href="{{ route('alumno.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Alumnos</a>
                  <a href="{{ route('alumno.create') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Nuevo Alumno</a>
                  <a href="{{ route('about') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Sobre la App</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>

      <header class="relative bg-white shadow-sm">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
          <h1 class="text-3xl font-bold tracking-tight text-gray-900">@yield('header', 'Gestor de Alumnos')</h1>
        </div>
      </header>

      <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
          @if(session('mensajeTexto'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
              {{ session('mensajeTexto') }}
            </div>
          @endif

          @error('mensajeTexto')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
              {{ $message }}
            </div>
          @enderror

          @yield('content')
        </div>
      </main>
    </div>
  </body>
</html>
