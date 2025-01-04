<?php

namespace App\Controllers;

use App\Models\BdDashboard;
use App\Models\PatientModel;

class BdDashboardController extends BaseController
{
    protected $dashboardModel;
    protected $patientModel;

    public function __construct()
    {
        $this->dashboardModel = new BdDashboard();
        $this->patientModel = new PatientModel();
    }

    public function bienvenida()
    {
        try {
            // Obtener pacientes recientes
            $recentPatients = $this->dashboardModel->getRecentPatients();

            // Formatear la diferencia de tiempo para cada paciente
            foreach ($recentPatients as &$patient) {
                $patient['tiempo_transcurrido'] = $this->dashboardModel->formatTimeAgo($patient['fecha_ultima_consulta']);
            }

            // Pasar los datos a la vista
            $data = [
                'recentPatients' => $recentPatients
            ];

            return view('dashboard/bienvenida', $data);
        } catch (\Exception $e) {
            // Manejar errores para evitar fallos del sistema
            return redirect()->back()->with('error', 'Ocurrió un error al cargar la información.');
        }
    }

    public function buscarpaciente()
    {
        try {
            // Obtener los pacientes frecuentes
            $frequentPatients = $this->patientModel->getFrequentPatients();

            // Formatear la diferencia de tiempo para cada paciente
            foreach ($frequentPatients as &$patient) {
                $patient['tiempo_transcurrido'] = $this->dashboardModel->formatTimeAgo($patient['fecha_ultima_consulta']);
            }

            // Pasar los datos a la vista usando un array asociativo
            return view('modulopaciente/buscarpaciente', ['frequentPatients' => $frequentPatients]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al cargar la lista de pacientes.');
        }
    }

    public function searchPatients()
    {
        try {
            $searchTerm = $this->request->getGet('searchTerm');
            $searchBy = $this->request->getGet('searchBy');

            if (empty($searchTerm) || empty($searchBy)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Términos de búsqueda incompletos',
                    'patients' => []
                ]);
            }

            $patients = $this->patientModel->searchPatients($searchTerm, $searchBy);

            // Formatear la diferencia de tiempo para cada paciente
            foreach ($patients as &$patient) {
                $patient['tiempo_transcurrido'] = $this->dashboardModel->formatTimeAgo($patient['fecha_ultima_consulta']);
            }

            return $this->response->setJSON([
                'success' => true,
                'patients' => $patients
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error al realizar la búsqueda',
                'patients' => []
            ]);
        }
    }

    public function buscadorhc()
    {
        try {
            return view('modulohistoriaclinica/buscadorhc');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al cargar el buscador de historias clínicas.');
        }
    }

    public function nuevopaciente()
    {
        try {
            return view('modulopaciente/nuevopaciente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al cargar el formulario de nuevo paciente.');
        }
    }
}