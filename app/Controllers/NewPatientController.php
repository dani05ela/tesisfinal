<?php

namespace App\Controllers;

use App\Models\PatientAdministrativeModel;
use App\Models\PatientPersonalDataModel;
use App\Models\PatientMedicalDataModel;
use App\Models\EmergencyContactModel;

class NewPatientController extends BaseController
{
    public function create()
    {
        $db = db_connect();

        try {
            // Consulta para obtener el último número de historia clínica
            $query = $db->query("SELECT numero_historia_clinica FROM pacientes_info_administrativa ORDER BY id DESC LIMIT 1");
            $lastNumber = $query->getRow();

            // Generar un nuevo número basado en el último o asignar el primer número si no hay registros
            $newNumber = $lastNumber && isset($lastNumber->numero_historia_clinica)
                ? 'HC' . str_pad((int) substr($lastNumber->numero_historia_clinica, 2) + 1, 6, '0', STR_PAD_LEFT)
                : 'HC000001'; // Primer número si no existen registros

            return view('modulopaciente/nuevopaciente', [
                'numero_historia_clinica' => $newNumber,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al generar el número de historia clínica: ' . $e->getMessage());
        }
    }

    public function store()
    {
        $db = db_connect();
        $adminModel = new PatientAdministrativeModel();
        $personalModel = new PatientPersonalDataModel();
        $medicalModel = new PatientMedicalDataModel();
        $contactModel = new EmergencyContactModel();

        $requestData = $this->request->getPost();

        // Inicia la transacción
        $db->transStart();

        try {
            // Insertar información administrativa
            $adminId = $adminModel->insert([
                'numero_historia_clinica' => $requestData['numero_historia_clinica'],
                'fecha_creacion' => $requestData['fecha_creacion'],
                'institucion' => $requestData['institucion'],
                'medico_responsable' => $requestData['medico_responsable'],
            ], true); // Retorna el ID insertado

            // Insertar datos personales
            $personalModel->insert([
                'info_administrativa_id' => $adminId,
                'nombres' => $requestData['nombres'],
                'apellidos' => $requestData['apellidos'],
                'fecha_nacimiento' => $requestData['fecha_nacimiento'],
                'genero' => $requestData['genero'],
                'cedula' => $requestData['cedula'],
                'nivel_instruccion' => $requestData['nivel_instruccion'],
                'ocupacion' => $requestData['ocupacion'],
                'estado_civil' => $requestData['estado_civil'],
                'telefono' => $requestData['telefono'],
                'correo_electronico' => $requestData['correo_electronico'],
                'direccion' => $requestData['direccion'],
            ]);

            // Insertar datos médicos
            $medicalModel->insert([
                'info_administrativa_id' => $adminId,
                'peso_actual' => $requestData['peso_actual'],
                'talla' => $requestData['talla'],
                'indice_masa_corporal' => $requestData['indice_masa_corporal'],
                'antecedentes_alergicos' => $requestData['antecedentes_alergicos'],
                'cirugias_previas' => $requestData['cirugias_previas'],
                'antecedentes_personales' => $requestData['antecedentes_personales'],
                'antecedentes_familiares' => $requestData['antecedentes_familiares'],
            ]);

            // Insertar contacto de emergencia
            $contactModel->insert([
                'info_administrativa_id' => $adminId,
                'nombre_completo' => $requestData['nombre_completo'],
                'relacion' => $requestData['relacion'],
                'numero_telefono' => $requestData['numero_telefono'],
            ]);

            $db->transComplete();

            if ($db->transStatus() === false) {
                throw new \Exception("Error al guardar los datos");
            }

            return redirect()->to('nuevopaciente')->with('success', 'Paciente registrado correctamente');
        } catch (\Exception $e) {
            $db->transRollback();
            return redirect()->to('nuevopaciente')->with('error', $e->getMessage());
        }
    }
}