<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientAdministrativeModel extends Model
{
    protected $table = 'pacientes_info_administrativa'; // Asegúrate de que coincide
    protected $primaryKey = 'id';
    protected $allowedFields = ['fecha_creacion', 'institucion', 'medico_responsable']; // Nombres exactos de las columnas
}

