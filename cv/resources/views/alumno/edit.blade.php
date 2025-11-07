@extends('app.bootstrap.template')

@section('content')

<form action="{{ route('alumno.update', $alumno->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="espacio">
        <label for="nombre">Nombre:</label>
        <input class="form-control" minlength="2" maxlength="100" required id="nombre" name="nombre" value="{{ old('nombre', $alumno->nombre) }}" type="text">
    </div>

    <div class="espacio">
        <label for="apellidos">Apellidos:</label>
        <input class="form-control" minlength="2" maxlength="150" required id="apellidos" name="apellidos" value="{{ old('apellidos', $alumno->apellidos) }}" type="text">
    </div>

    <div class="espacio">
        <label for="telefono">Teléfono:</label>
        <input class="form-control" maxlength="20" id="telefono" name="telefono" value="{{ old('telefono', $alumno->telefono) }}" type="text">
    </div>

    <div class="espacio">
        <label for="correo">Correo electrónico:</label>
        <input class="form-control" maxlength="150" required id="correo" name="correo" value="{{ old('correo', $alumno->correo) }}" type="email">
    </div>

    <div class="espacio">
        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}" type="date">
    </div>

    <div class="espacio">
        <label for="nota_media">Nota media:</label>
        <input class="form-control" step="0.01" min="0" max="10" id="nota_media" name="nota_media" value="{{ old('nota_media', $alumno->nota_media) }}" type="number">
    </div>

    <div class="espacio">
        <label for="experiencia">Experiencia:</label>
        <textarea class="form-control" id="experiencia" name="experiencia" rows="4">{{ old('experiencia', $alumno->experiencia) }}</textarea>
    </div>

    <div class="espacio">
        <label for="formacion">Formación:</label>
        <textarea class="form-control" id="formacion" name="formacion" rows="4">{{ old('formacion', $alumno->formacion) }}</textarea>
    </div>

    <div class="espacio">
        <label for="habilidades">Habilidades:</label>
        <textarea class="form-control" id="habilidades" name="habilidades" rows="3">{{ old('habilidades', $alumno->habilidades) }}</textarea>
    </div>

    <div class="espacio">
        <label for="fotografia">Actualizar fotografía:</label>
        <input class="form-control" id="fotografia" name="fotografia" type="file" accept="image/*">
    </div>

    <div class="espacio">
        <input class="btn btn-primary" value="Guardar cambios" type="submit">
    </div>
</form>

@endsection
