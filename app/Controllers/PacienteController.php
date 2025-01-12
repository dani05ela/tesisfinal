<?php
namespace App\Controllers;
use App\Models\PacienteModel;

class PacienteController extends BaseController
{
    public function guardarPaciente(): string
    {
        $hc_id = $this->request->getPost('hc_id');
        $id_paciente = (int)$hc_id + 1;

        // Obtener datos de información administrativa
        $datosAdministrativos = [

            'fecha_creacion' => $this->request->getPost('fecha_creacion'),
            'institucion' => $this->request->getPost('institucion'),
            'medico_responsable' => $this->request->getPost('medico_responsable'),
            'id_paciente' => $id_paciente,

        ];

        // Obtener datos de información personal
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

        // Manejar la carga del archivo
        $archivo = $this->request->getFile('documentos'); // Obtiene el archivo desde el input "documentos"


        $contenidoArchivo = file_get_contents($archivo->getTempName());

        // Agregar el contenido binario a los datos personales
        $datosPersonales['documento_identificacion'] = $contenidoArchivo;


        // Instanciar el modelo y guardar los datos
        $pacienteModel = new PacienteModel();
        $resultadoAdmin = $pacienteModel->insertarInformacionAdministrativa($datosAdministrativos);
        $resultadoPersonales = $pacienteModel->insertarPaciente($datosPersonales);

        // Verificar si las inserciones fueron exitosas
        if ($resultadoAdmin && $resultadoPersonales) {
            return view('modulohistoriasclinicas/bienvenida');
        } else {
            // return view('paciente/error', ['mensaje' => 'Ocurrió un problema al guardar los datos.']);
        }
    }

}