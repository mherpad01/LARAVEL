<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno';

    protected $fillable = [
        'nombre',
        'apellidos',
        'telefono',
        'correo',
        'fecha_nacimiento',
        'nota_media',
        'experiencia',
        'formacion',
        'habilidades',
        'fotografia'
    ];

    /**
     * Devuelve la URL completa de la fotografía del alumno.
     * Si no tiene foto, muestra una imagen por defecto.
     */
    public function getPath()
    {
        if ($this->fotografia == null) {
            $path = url('assets/img/anonimo.jpg');
        } else {
            $path = url('storage/' . $this->fotografia);
        }
        return $path;
    }

    function getPdf() {
      //Ruta de la web, desde public
      return url('storage/pdf') . '/' . $this->id . '.pdf';
    }

    function isPdf() {
        //Ruta desde la raiz del sistema de archivos del sistema.
        return file_exists(storage_path('app/public/pdf') . '/' . $this->id . '.pdf');
    }
    
  
}
