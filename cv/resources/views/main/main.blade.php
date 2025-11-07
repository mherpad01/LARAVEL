@extends('app.bootstrap.template')

@section('content')
<div class="container px-4 py-5" id="custom-cards">

    <h2 class="pb-2 border-bottom text-center text-uppercase fw-bold">
        Alumnos Destacados
    </h2>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 py-5">
        @foreach($alumnos as $alumno)
            <div class="col">
                <a href="{{ route('alumno.show', $alumno->id) }}" class="text-decoration-none text-white">
                    <div 
                        class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg border-0"
                        style="
                            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)),
                                              url('{{ $alumno->getPath() }}');
                            background-size: cover;
                            background-position: center;
                            transition: transform 0.3s ease, box-shadow 0.3s ease;
                        "
                        onmouseover="this.style.transform='scale(1.03)'; this.style.boxShadow='0 8px 30px rgba(0,0,0,0.4)';"
                        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.2)';"
                    >
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold text-uppercase">
                                {{ $alumno->nombre }} {{ $alumno->apellidos }}
                            </h3>

                            <ul class="d-flex list-unstyled mt-auto small">
                                <li class="me-auto">
                                    <img 
                                        src="{{ $alumno->getPath() }}" 
                                        alt="Alumno" 
                                        width="40" 
                                        height="40" 
                                        class="rounded-circle border border-light shadow-sm"
                                    >
                                </li>

                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em" role="img" aria-label="Correo">
                                        <use xlink:href="#envelope"></use>
                                    </svg>
                                    <small class="opacity-75">{{ $alumno->correo }}</small>
                                </li>

                                <li class="d-flex align-items-center">
                                    <svg class="bi me-2" width="1em" height="1em" role="img" aria-label="ID">
                                        <use xlink:href="#calendar3"></use>
                                    </svg>
                                    <small class="opacity-75">ID: {{ $alumno->id }}</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
