@extends('app.bootstrap.template')

@section('content')

<form action="{{ route('alumno.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="espacio">
        <label for="nombre">Nombre:</label>
        <input class="form-control" minlength="2" maxlength="100" required id="nombre" name="nombre" placeholder="Nombre del alumno" value="{{ old('nombre') }}" type="text">
    </div>

    <div class="espacio">
        <label for="apellidos">Apellidos:</label>
        <input class="form-control" minlength="2" maxlength="150" required id="apellidos" name="apellidos" placeholder="Apellidos del alumno" value="{{ old('apellidos') }}" type="text">
    </div>

    <div class="espacio">
        <label for="telefono">Teléfono:</label>
        <input class="form-control" maxlength="20" id="telefono" name="telefono" placeholder="Teléfono de contacto" value="{{ old('telefono') }}" type="text">
    </div>

    <div class="espacio">
        <label for="correo">Correo electrónico:</label>
        <input class="form-control" maxlength="150" required id="correo" name="correo" placeholder="Correo del alumno" value="{{ old('correo') }}" type="email">
    </div>

    <div class="espacio">
        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" type="date">
    </div>

    <div class="espacio">
        <label for="nota_media">Nota media:</label>
        <input class="form-control" step="0.01" min="0" max="10" id="nota_media" name="nota_media" placeholder="Nota media del alumno" value="{{ old('nota_media') }}" type="number">
    </div>

    <div class="espacio">
        <label for="experiencia">Experiencia:</label>
        <textarea class="form-control" id="experiencia" name="experiencia" placeholder="Experiencia profesional o prácticas" rows="4">{{ old('experiencia') }}</textarea>
    </div>

    <div class="espacio">
        <label for="formacion">Formación:</label>
        <textarea class="form-control" id="formacion" name="formacion" placeholder="Formación académica" rows="4">{{ old('formacion') }}</textarea>
    </div>

    <div class="espacio">
        <label for="habilidades">Habilidades:</label>
        <textarea class="form-control" id="habilidades" name="habilidades" placeholder="Habilidades destacadas" rows="3">{{ old('habilidades') }}</textarea>
    </div>

    <div class="espacio">
        <label for="fotografia">Fotografía:</label>
        <input class="form-control" id="fotografia" name="fotografia" type="file" accept="image/*">
    </div>

    <div class="espacio">
        <label for="pdf">PDF:</label>
        <input type="file" class="form-control" id="pdf" name="pdf" accept="application/pdf">
    </div>

    <div class="espacio">
        <input class="btn btn-primary" value="Añadir alumno" type="submit">
    </div>
</form>

@endsection
