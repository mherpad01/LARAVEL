<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\View\View;

class MainController extends Controller
{
    public function about(): View
    {
        return view('main.about');
    }

    public function main(): View
    {
        $alumnos = Alumno::all();
        return view('main.main', ['alumnos' => $alumnos]);
    }
}
