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

    public function editarPaciente()
    {
        $pac_id = $this->request->getPost('pac_id');
        $model = new PacienteModel();
        $data = $model->getPacienteInfo($pac_id);
      
        return view('modulopaciente/update/updatePaciente', ['data' => $data]); // Controller para ir al historia clinica
    }

    public function actualizarpaciente(){
        $pac_id = $this->request->getPost('pac_id');

        $nombre_imagen = $_FILES['documentos']['name'];
        $temporal = $_FILES['documentos']['tmp_name'];

        $nombrediferencia = date('dhms');

        $nombrefinal = $nombrediferencia . $nombre_imagen;

        $carpetaDestino = 'assets/almacenamientoUpdate';

        $ruta = ($carpetaDestino . '/' . $nombrefinal);
        move_uploaded_file($temporal, $carpetaDestino . '/' . $nombrefinal);


        $datosPersonales = [
            'apellidos' => $this->request->getPost('apellidos'),
            'nombres' => $this->request->getPost('nombres'),
            'fecha_nacimiento' => $this->request->getPost('fecha_nacimiento'),
            'edad' => $this->request->getPost('edad'),
            'genero' => $this->request->getPost('genero'),
            'cedula' => $this->request->getPost('cedula'),
            'nivel_instruccion' => $this->request->getPost('nivel_instruccion'),
            'ocupacion' => $this->request->getPost('ocupacion'),
            'estado_civil' => $this->request->getPost('estado_civil'),
            'telefono' => $this->request->getPost('telefono'),
            'email' => $this->request->getPost('email'),
            'direccion' => $this->request->getPost('direccion'),
            'documentos' => $ruta,
            // Datos médicos
            'peso' => $this->request->getPost('peso'),
            'talla' => $this->request->getPost('talla'),
            'imc' => $this->request->getPost('imc'),
            'antecedentes_alergicos' => $this->request->getPost('antecedentes_alergicos'),
            'cirugias_previas' => $this->request->getPost('cirugias_previas'),
            'antecedentes_personales' => $this->request->getPost('antecedentes_personales'),
            'antecedentes_familiares' => $this->request->getPost('antecedentes_familiares'),
            // Contacto de emergencia
            'contacto_nombre' => $this->request->getPost('contacto_nombre'),
            'contacto_relacion' => $this->request->getPost('contacto_relacion'),
            'contacto_telefono' => $this->request->getPost('contacto_telefono'),
        ];

        $model = new PacienteModel();
        $resultado = $model->updatePaciente($pac_id, $datosPersonales);
        $ultimosPacientes = $model->obtenerUltimosPacientes();

        // Verificar si la inserción fue exitosa
        if ($resultado) {
            // Configurar el mensaje flash
            return redirect()->to(base_url('bienvenida'))->with('success', 'Paciente actualizado exitosamente.')->with('pacientes', $ultimosPacientes);
        } else {
            return redirect()->to(base_url('error'))->with('error', 'Error al guardar el paciente.');
        }


    }



    public function nuevaConsulta(): string
    {
        $pac_id = $this->request->getPost('pac_id');



        return view('modulohistoriasclinicas/nuevacita'); // Controller para ir al historia clinica
    }

    public function receta(): string
    {
        return view('modulohistoriasclinicas/receta'); // Controller para ir al historia clinica
    }

}