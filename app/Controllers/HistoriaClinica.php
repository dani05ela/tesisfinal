<?php

namespace App\Controllers;
use App\Models\PacienteModel;

class HistoriaClinica extends BaseController
{
    public function resumenpaciente(): string
    {
        $model = new PacienteModel();
        $session = session(); // Inicia la sesión
    
        // Obtener el ID del paciente desde el POST
        $pac_id = $this->request->getPost('pac_id');
    
        // Guardar el ID en la sesión
        $session->set('pac_id', $pac_id);
    
        // Obtener los datos del paciente desde el modelo
        $data = $model->getPacienteInfo($pac_id);
    
        // Cargar la vista con los datos del paciente
        return view('modulohistoriasclinicas/resumenpaciente', ['data' => $data]);
    }
    

    public function historiaclinica(): string
    {
        $model = new PacienteModel();
        $session = session(); // Inicia la sesión
    
        // Obtener el ID del paciente desde el POST
        $pac_id = $this->request->getPost('pac_id');
    
        // Guardar el ID en la sesión
        $session->set('pac_id', $pac_id);
    
        // Obtener los datos del paciente desde el modelo
        $data = $model->getPacienteInfo($pac_id);

        return view('modulohistoriasclinicas/historiaclinica', ['data' => $data]); // Controller para ir al historia clinica
    }

    public function nuevacita(): string
    {
        return view('modulohistoriasclinicas/nuevacita'); // Controller para ir al historia clinica
    }

    public function receta(): string
    {
        return view('modulohistoriasclinicas/receta'); // Controller para ir al historia clinica
    }

}