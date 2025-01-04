<?php

namespace App\Models;

use CodeIgniter\Model;

class EmergencyContactModel extends Model
{
    protected $table = 'contactos_emergencia';
    protected $primaryKey = 'id';
    protected $allowedFields = ['info_administrativa_id', 'nombre_completo', 'relacion', 'numero_telefono'];
}
