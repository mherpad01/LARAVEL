<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AlumnoController extends Controller
{
    public function index(): View
    {
        $alumnos = Alumno::all();
        return view('alumno.index', ['alumnos' => $alumnos]);
    }

    public function create(): View
    {
        return view('alumno.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $alumno = new Alumno($request->all());
        $result = false;

        try {
            $result = $alumno->save();
            $txtmessage = 'El alumno ha sido añadido correctamente.';

            if ($request->hasFile('fotografia')) {
                $ruta = $this->upload($request, $alumno);
                $alumno->fotografia = $ruta;
                $alumno->save();
            }

            if($request->hasFile('pdf')) {
               $ruta = $this->uploadPDF($request,$alumno);
            }

        } catch (QueryException $e) {
            $txtmessage = 'Error de base de datos.';
        } catch (\Exception $e) {
            $txtmessage = 'Ha ocurrido un error.';
        }

        $messageArray = ['mensajeTexto' => $txtmessage];

        if ($result) {
            return redirect()->route('main')->with($messageArray);
        } else {
            return back()->withInput()->withErrors($messageArray);
        }
    }


    private function uploadPDF(Request $request, Alumno $alumno){
      //Guarda en la variable img el acceso a la foto subida.
      $pdf = $request->file('pdf');
      $name = $alumno->id . '.' . $pdf->getClientOriginalExtension();
      $ruta = $pdf->storeAs('pdf',$name,'public'); 
      $ruta = $pdf->storeAs('pdf',$name,'local');
      return $ruta;
    }
    
    /**
     * Guarda la imagen en public/storage/alumno/
     */
    private function upload(Request $request, Alumno $alumno)
    {
        $image = $request->file('fotografia');
        $name = $alumno->id . '.' . $image->getClientOriginalExtension();
        $ruta = $image->storeAs('alumno',$name,'public'); 
        $ruta = $image->storeAs('alumno',$name,'local');

        return $ruta;
    }

    public function show(Alumno $alumno): View
    {
        return view('alumno.show', ['alumno' => $alumno]);
    }

    public function edit(Alumno $alumno): View
    {
        return view('alumno.edit', ['alumno' => $alumno]);
    }

    public function update(Request $request, Alumno $alumno): RedirectResponse
    {
        $alumno->fill($request->all());
        $result = false;

        try {
            $result = $alumno->save();
            $txtmessage = 'El alumno ha sido actualizado correctamente.';

            if ($request->hasFile('fotografia')) {

                // Si ya hay una foto, eliminar la anterior
                if ($alumno->fotografia && file_exists(public_path('storage/alumno/' . $alumno->fotografia))) {
                    unlink(public_path('storage/alumno/' . $alumno->fotografia));
                }

                $ruta = $this->upload($request, $alumno);
                $alumno->fotografia = $ruta;
                $alumno->save();
            }
        } catch (QueryException $e) {
            $txtmessage = 'Error de base de datos.';
        } catch (\Exception $e) {
            $txtmessage = 'Ha ocurrido un error.';
        }

        $message = ['mensajeTexto' => $txtmessage];

        if ($result) {
            return redirect()->route('main')->with($message);
        } else {
            return back()->withInput()->withErrors($message);
        }
    }

    public function destroy(Alumno $alumno): RedirectResponse
    {
        try {
            // Borrar imagen del alumno si existe
            if ($alumno->fotografia && file_exists(public_path('storage/alumno/' . $alumno->fotografia))) {
                unlink(public_path('storage/alumno/' . $alumno->fotografia));
            }

            $result = $alumno->delete();
            $textMessage = 'El alumno ha sido eliminado.';
        } catch (\Exception $e) {
            $textMessage = 'El alumno no se ha podido eliminar.';
            $result = false;
        }

        $message = ['mensajeTexto' => $textMessage];

        if ($result) {
            return redirect()->route('main')->with($message);
        } else {
            return back()->withInput()->withErrors($message);
        }
    }
}
