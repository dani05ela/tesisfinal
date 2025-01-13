<?php

namespace App\Controllers;
use App\Models\PacienteModel;

class HistoriaClinica extends BaseController
{
    public function resumenpaciente(): string
    {
        $model = new PacienteModel();
        $pac_id = $this->request->getPost('pac_id');
        // Imprimir pac_id para verificar si está llegando correctamente
        //echo "pac_id recibido: " . $pac_id;
        $data = $model->getPacienteInfo($pac_id);
        //var_dump($data);

        return view('modulohistoriasclinicas/resumenpaciente', ['data' => $data]); // Controller para ir al resumen del paciente
    }

    public function historiaclinica(): string
    {

        return view('modulohistoriasclinicas/historiaclinica'); // Controller para ir al historia clinica
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