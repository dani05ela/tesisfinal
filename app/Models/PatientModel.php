<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table = 'pacientes_datos_personales';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'info_administrativa_id', 'nombres', 'apellidos', 'fecha_nacimiento',
        'edad', 'genero', 'cedula', 'nivel_instruccion', 'ocupacion',
        'estado_civil', 'telefono', 'correo_electronico', 'direccion'
    ];

    public function searchPatients(string $searchTerm, string $searchBy = 'nombres')
    {
        $builder = $this->db->table($this->table . ' as pdp')
            ->select('pdp.*, pia.numero_historia_clinica, pia.fecha_ultima_consulta')
            ->join('pacientes_info_administrativa pia', 'pdp.info_administrativa_id = pia.id');

        $searchTerm = $this->db->escapeLikeString($searchTerm);

        switch ($searchBy) {
            case 'cedula':
                $builder->like('pdp.cedula', $searchTerm);
                break;
            case 'nombres':
                // Usar unaccent para búsqueda sin sensibilidad a acentos
                $builder->where("unaccent(lower(pdp.nombres)) LIKE unaccent(lower('%{$searchTerm}%'))");
                break;
            case 'apellidos':
                // Usar unaccent para búsqueda sin sensibilidad a acentos
                $builder->where("unaccent(lower(pdp.apellidos)) LIKE unaccent(lower('%{$searchTerm}%'))");
                break;
        }

        return $builder->get()->getResultArray();
    }

    public function getFrequentPatients(int $limit = 3): array
    {
        return $this->db->table($this->table . ' as pdp')
            ->select('pdp.*, pia.numero_historia_clinica, pia.fecha_ultima_consulta')
            ->join('pacientes_info_administrativa pia', 'pdp.info_administrativa_id = pia.id')
            ->orderBy('pia.fecha_ultima_consulta', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function search()
{
    if (!$this->validateSearch()) {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Datos de búsqueda inválidos.'
        ]);
    }

    $searchTerm = $this->request->getGet('searchTerm');
    $searchBy = $this->request->getGet('searchBy');

    try {
        $patients = $this->patientModel->searchPatients($searchTerm, $searchBy);

        return $this->response->setJSON([
            'success' => true,
            'patients' => $patients
        ]);
    } catch (\Exception $e) {
        log_message('error', $e->getMessage());
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Ocurrió un error durante la búsqueda.'
        ]);
    }
}

}