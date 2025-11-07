@extends('app.bootstrap.template')

@section('content')
<main class="px-3 text-center">

    <h1>{{ $alumno->nombre }} {{ $alumno->apellidos }}</h1>

    <p class="lead">
        <img src="{{ route('imagen.imagen', $alumno->id) }}" width="30%">
    </p>

    @if($alumno->isPdf())
     <p class="lead">
        <a href="{{ $alumno->getPdf() }}" target="pdf">PDF</a>
    </p>  
     @endif

    <div class="lead text-start mx-auto" style="max-width: 600px;">
        <p><strong>Teléfono:</strong> {{ $alumno->telefono ?? 'No indicado' }}</p>
        <p><strong>Correo:</strong> {{ $alumno->correo }}</p>
        <p><strong>Fecha de nacimiento:</strong> {{ $alumno->fecha_nacimiento ?? 'No indicada' }}</p>
        <p><strong>Nota media:</strong> {{ $alumno->nota_media ?? 'N/A' }}</p>
        <p><strong>Experiencia:</strong><br>{{ $alumno->experiencia ?? 'Sin experiencia registrada' }}</p>
        <p><strong>Formación:</strong><br>{{ $alumno->formacion ?? 'No especificada' }}</p>
        <p><strong>Habilidades:</strong><br>{{ $alumno->habilidades ?? 'No especificadas' }}</p>
    </div>

    <a href="{{ route('alumno.index') }}" class="btn btn-outline-secondary mt-3">Volver al listado</a>

</main>
@endsection
