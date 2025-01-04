<?php

namespace App\Controllers;

use App\Models\PatientModel;
use CodeIgniter\Controller;

class PatientController extends Controller
{
    protected $patientModel;

    public function __construct()
    {
        $this->patientModel = new PatientModel();
    }

    public function index()
    {
        $data['frequentPatients'] = $this->patientModel->getFrequentPatients();
        return view('pacientes/buscarpaciente', $data);
    }

    public function search()
    {
        $searchTerm = $this->request->getGet('searchTerm');
        $searchBy = $this->request->getGet('searchBy');

        if (!$this->validate([
            'searchTerm' => 'required|alpha_numeric_space',
            'searchBy' => 'required|in_list[cedula,nombres,apellidos]'
        ])) {
            return $this->response->setJSON(['error' => 'Datos inválidos']);
        }

        $data['patients'] = $this->patientModel->searchPatients($searchTerm, $searchBy);
        return $this->response->setJSON($data);
    }

    public function viewHistory($patientId)
    {
        return redirect()->to(base_url("/historiaclinica/{$patientId}"));
    }
}