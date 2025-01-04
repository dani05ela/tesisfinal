<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientMedicalDataModel extends Model
{
    protected $table = 'pacientes_datos_medicos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['info_administrativa_id', 'peso_actual', 'talla', 'indice_masa_corporal', 'antecedentes_alergicos', 'cirugias_previas', 'antecedentes_personales', 'antecedentes_familiares'];
}
