<?php

namespace App\Models;

use CodeIgniter\Model;

class BdDashboard extends Model
{
    protected $table = 'pacientes_info_administrativa';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'numero_historia_clinica', 
        'fecha_creacion', 
        'institucion', 
        'medico_responsable', 
        'estado_paciente', 
        'fecha_ultima_consulta'
    ];

    /**
     * Obtener pacientes recientes.
     *
     * @param int $limit Número máximo de pacientes a obtener.
     * @return array Lista de pacientes recientes.
     */
    public function getRecentPatients($limit = 3)
    {
        return $this->select('
                pacientes_info_administrativa.id,
                pacientes_info_administrativa.fecha_ultima_consulta,
                pacientes_datos_personales.nombres,
                pacientes_datos_personales.apellidos
            ')
            ->join('pacientes_datos_personales', 'pacientes_datos_personales.info_administrativa_id = pacientes_info_administrativa.id')
            ->where('pacientes_info_administrativa.estado_paciente', 'ACTIVO')
            ->orderBy('pacientes_info_administrativa.fecha_ultima_consulta', 'DESC')
            ->limit($limit)
            ->findAll(); // Corrección: cambiar `find()` por `findAll()` para múltiples resultados.
    }

    /**
     * Formatear fecha en tiempo relativo (e.g., "Hace 2 días").
     *
     * @param string $datetime Fecha en formato datetime.
     * @return string Tiempo transcurrido.
     */
    public function formatTimeAgo($datetime)
    {
        $timestamp = strtotime($datetime);
        $now = time();
        $diff = $now - $timestamp;

        if ($diff < 60) {
            return "Hace un momento";
        } elseif ($diff < 3600) {
            $minutes = floor($diff / 60);
            return "Hace " . $minutes . " minuto" . ($minutes > 1 ? "s" : "");
        } elseif ($diff < 86400) {
            $hours = floor($diff / 3600);
            return "Hace " . $hours . " hora" . ($hours > 1 ? "s" : "");
        } else {
            $days = floor($diff / 86400);
            return "Hace " . $days . " día" . ($days > 1 ? "s" : "");
        }
    }
}
