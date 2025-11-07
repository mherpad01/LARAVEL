@extends('app.bootstrap.template')

@section('content')

<!-- Modal de confirmación -->
<div class="modal fade" id="destroyModal" tabindex="-1" aria-labelledby="destroyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="destroyModalLabel">Confirmar eliminación de alumno</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body" id="destroyModalContent"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button form="form-delete" type="submit" class="btn btn-primary">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<hr>

<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->id }}</td>
                <td>{{ $alumno->nombre }}</td>
                <td>{{ $alumno->apellidos }}</td>
                <td>{{ $alumno->correo }}</td>
                <td>
                    <a href="{{ route('alumno.show', $alumno->id) }}" class="btn btn-success btn-sm">Ver</a>
                    <a href="{{ route('alumno.edit', $alumno->id) }}" class="text-white btn btn-warning btn-sm">Editar</a>
                    <a class="btn btn-danger btn-sm" data-bs-target="#destroyModal" data-bs-toggle="modal"
                       data-href="{{ route('alumno.destroy', $alumno->id) }}"
                       data-alumno="{{ $alumno->nombre }}">
                        Eliminar
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4">Número de alumnos:</th>
            <th>{{ count($alumnos) }}</th>
        </tr>
    </tfoot>
</table>

<form action="" method="post" id="form-delete">
    @csrf
    @method('delete')
</form>

@endsection
