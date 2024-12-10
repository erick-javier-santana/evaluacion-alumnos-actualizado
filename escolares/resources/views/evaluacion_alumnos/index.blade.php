@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Evaluaciones</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('evaluacion_alumnos.create') }}" class="btn btn-primary mb-3">Crear Nueva Evaluación</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Periodo</th>
                <th>No de Control</th>
                <th>Materia</th>
                <th>Grupo</th>
                <th>RFC</th>
                <th>Clave Área</th>
                <th>Encuesta</th>
                <th>Respuestas</th>
                <th>Respuesta Abierta</th>
                <th>Usuario</th>
                <th>Fecha y Hora de Evaluación</th>
                <th>Consecutivo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evaluacion_alumnos as $evaluacion)
                <tr>
                    <td>{{ $evaluacion->periodo }}</td>
                    <td>{{ $evaluacion->no_de_control }}</td>
                    <td>{{ $evaluacion->materia }}</td>
                    <td>{{ $evaluacion->grupo }}</td>
                    <td>{{ $evaluacion->rfc }}</td>
                    <td>{{ $evaluacion->clave_area }}</td>
                    <td>{{ $evaluacion->encuesta }}</td>
                    <td>{{ $evaluacion->respuestas }}</td>
                    <td>{{ $evaluacion->resp_abierta }}</td>
                    <td>{{ $evaluacion->usuario }}</td>
                    <td>{{ $evaluacion->fecha_hora_evaluacion->format('d/m/Y H:i') }}</td>
                    <td>{{ $evaluacion->consecutivo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $evaluacion_alumnos->links() }}
</div>
@endsection