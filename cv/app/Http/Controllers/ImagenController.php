<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class ImagenController extends Controller
{
    public function imagen($idalumno)
    {
        $alumno = Alumno::find($idalumno);

        if ($alumno == null || $alumno->fotografia == null) {
            return response()->file(base_path('/public/assets/img/noimage.jpg'));
        }

        return response()->file(storage_path('app/private') . '/' . $alumno->fotografia);
    }
}
