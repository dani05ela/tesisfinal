<?php

namespace App\Controllers;
use App\Models\PacienteModel;

class Dashboard extends BaseController
{
    public function bienvenida()
    {
        $pacienteModel = new PacienteModel();
        $ultimosPacientes = $pacienteModel->obtenerUltimosPacientes();
        
        // Pasar los datos a la vista directamente
        return view('modulohistoriasclinicas/bienvenida', [
            'pacientes' => $ultimosPacientes
        ]);
    }
    

    public function buscarpaciente(): string
    {
        return view('modulopaciente/buscarpaciente'); // Controller para ir al modulo de pacientes
    }

    public function buscadorhc(): string
    {
        return view('modulohistoriasclinicas/buscadorhc'); // Controller para ir al modulo de historias clinicas
    }

    public function nuevoInfoAdmin(): string
    {
        // Instanciamos el modelo
        $pacienteModel = new PacienteModel();

        // Obtenemos el último ID sumándole 1
        $ultimoId = $pacienteModel->obtenerUltimoId() + 1;

        // Concatenamos el prefijo "HC-" al ID
        $numeroHistoriaClinica = "HC-" . $ultimoId;

        // Enviamos el valor concatenado a la vista
        return view('modulopaciente/nuevoInfoAdmin', ['numeroHistoriaClinica' => $numeroHistoriaClinica]);
    }


}