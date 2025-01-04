<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientPersonalDataModel extends Model
{
    protected $table = 'pacientes_datos_personales';
    protected $primaryKey = 'id';
    protected $allowedFields = ['info_administrativa_id', 'nombres', 'apellidos', 'fecha_nacimiento', 'edad', 'genero', 'cedula', 'nivel_instruccion', 'ocupacion', 'estado_civil', 'telefono', 'correo_electronico', 'direccion'];
}
