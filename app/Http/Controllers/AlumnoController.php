<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    // Mostrar la lista de alumnos
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    // Mostrar el formulario de creación
    public function create()
    {
        return view('alumnos.create');
    }

    // Guardar un nuevo alumno
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:alumnos,correo',
            'fecha_nacimiento' => 'required|date',
            'ciudad' => 'required|string|max:255',
        ]);

        Alumno::create($request->all());

        return redirect()->route('alumnos.index')->with('success', 'Alumno registrado con éxito');
    }

    // Otros métodos generados por el resource (puedes implementarlos si quieres)
    public function show(Alumno $alumno) {
         return view('alumnos.alumnos-show', compact('alumno'));
    }
    
    public function edit(Alumno $alumno) {
        return view('alumnos.editar-alumnos', compact('alumno'));
    }
    public function update(Request $request, Alumno $alumno) {
         $alumno->nombre = $request->nombre;
         $alumno->correo = $request->correo;
         $alumno->fecha_nacimiento = $request->fecha_nacimiento;
         $alumno->ciudad = $request->ciudad;
         $alumno->save();
 
         return redirect()->route('alumnos.index', $alumno);
    }
    public function destroy(Alumno $alumno) {
            $alumno->delete();
            return redirect()->route('alumnos.index');
    }
}