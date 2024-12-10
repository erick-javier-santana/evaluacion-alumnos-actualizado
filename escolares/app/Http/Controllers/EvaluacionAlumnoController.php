<?php


namespace App\Http\Controllers;

use App\Models\EvaluacionAlumno;
use Illuminate\Http\Request;

class EvaluacionAlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evaluacion_alumnos = EvaluacionAlumno::paginate(10); // Paginación
        return view('evaluacion_alumnos.index', compact('evaluacion_alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('evaluacion_alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'periodo' => 'required|max:5',
            'no_de_control' => 'required|max:10',
            'materia' => 'required|max:7',
            'grupo' => 'required|max:3',
            'rfc' => 'required|max:13',
            'clave_area' => 'required|max:6',
            'encuesta' => 'required|max:1',
            'respuestas' => 'required|max:50',
            'resp_abierta' => 'nullable|max:255',
            'usuario' => 'required|max:30',
            'fecha_hora_evaluacion' => 'required|date',
            'consecutivo' => 'required|integer',
        ]);

        EvaluacionAlumno::create($request->all());

        return redirect()->route('evaluacion_alumnos.index')->with('success', 'Evaluación creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $evaluacion_alumno = EvaluacionAlumno::findOrFail($id);
        return view('evaluacion_alumnos.show', compact('evaluacion_alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $evaluacion_alumno = EvaluacionAlumno::findOrFail($id);
        return view('evaluacion_alumnos.edit', compact('evaluacion_alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'periodo' => 'required|max:5',
            'no_de_control' => 'required|max:10',
            'materia' => 'required|max:7',
            'grupo' => 'required|max:3',
            'rfc' => 'required|max:13',
            'clave_area' => 'required|max:6',
            'encuesta' => 'required|max:1',
            'respuestas' => 'required|max:50',
            'resp_abierta' => 'nullable|max:255',
            'usuario' => 'required|max:30',
            'fecha_hora_evaluacion' => 'required|date',
            'consecutivo' => 'required|integer',
        ]);

        $evaluacion_alumno = EvaluacionAlumno::findOrFail($id);
        $evaluacion_alumno->update($request->all());

        return redirect()->route('evaluacion_alumnos.index')->with('success', 'Evaluación actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $evaluacion_alumno = EvaluacionAlumno::findOrFail($id);
        $evaluacion_alumno->delete();

        return redirect()->route('evaluacion_alumnos.index')->with('success', 'Evaluación eliminada correctamente.');
    }
}