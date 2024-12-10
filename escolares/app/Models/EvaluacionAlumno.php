<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EvaluacionAlumno extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'evaluacion_alumnos';

    // Indicar la clave primaria correcta
    protected $primaryKey = 'consecutivo';

    // Clave primaria no auto-incremental
    public $incrementing = false;

    // Tipo de clave primaria
    protected $keyType = 'int';

    // Los campos que pueden asignarse de forma masiva
    protected $fillable = [
        'periodo',
        'no_de_control',
        'materia',
        'grupo',
        'rfc',
        'clave_area',
        'encuesta',
        'respuestas',
        'resp_abierta',
        'usuario',
        'fecha_hora_evaluacion',
        'consecutivo'
    ];

    // Indicamos que las fechas deben ser tratadas como objetos de tipo Carbon
    protected $dates = ['fecha_hora_evaluacion'];
}