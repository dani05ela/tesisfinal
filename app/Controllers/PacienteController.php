<?php
namespace App\Controllers;
use App\Models\PacienteModel;

class PacienteController extends BaseController
{

    public function guardarinfoAdmin(): string
    {
        $pacienteModel = new PacienteModel();
        $datosAdministrativos = [
            'fecha_creacion' => $this->request->getPost('fecha_creacion'),
            'institucion' => $this->request->getPost('institucion'),
            'medico_responsable' => $this->request->getPost('medico_responsable'),
        ];

        $resultado = $pacienteModel->insertarInformacionAdministrativa($datosAdministrativos);
        if ($resultado) {
            return view('modulopaciente/nuevoPaciente');
        } else {
            // return view('paciente/error', ['mensaje' => 'Ocurrió un problema al guardar los datos.']);
        }

    }

    public function guardarPaciente()
    {

        $nombre_imagen = $_FILES['documentos']['name'];
        $temporal = $_FILES['documentos']['tmp_name'];

        $nombrediferencia = date('dhms');

        $nombrefinal = $nombrediferencia . $nombre_imagen;

        $carpetaDestino = 'assets/almacenamiento';

        $ruta = ($carpetaDestino . '/' . $nombrefinal);
        move_uploaded_file($temporal, $carpetaDestino . '/' . $nombrefinal);

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

        // Instanciar el modelo y guardar los datos
        $pacienteModel = new PacienteModel();
        $resultadoPersonales = $pacienteModel->insertarPaciente($datosPersonales);
        $resultadoUpdateInfoAdmin = $pacienteModel->updateInfoAdmin();
        $ultimosPacientes = $pacienteModel->obtenerUltimosPacientes();

        // Verificar si la inserción fue exitosa
        if ($resultadoPersonales && $resultadoUpdateInfoAdmin) {
            // Configurar el mensaje flash
            return redirect()->to(base_url('bienvenida'))->with('success', 'Paciente creado exitosamente.')->with('pacientes', $ultimosPacientes);
        } else {
            return redirect()->to(base_url('error'))->with('error', 'Error al guardar el paciente.');
        }
    }


    public function filtrarPacientes()
    {
        // Obtener los datos enviados desde el formulario
        $criterio = $this->request->getPost('criterio');
        $filtro = $this->request->getPost('filtro');

        // Validar que los datos no estén vacíos
        if (!$criterio || !$filtro) {
            return redirect()->to(base_url('/buscarpaciente'))->with('error', 'Por favor, complete todos los campos de búsqueda.');
        }

        // Instanciar el modelo de pacientes
        $pacienteModel = new PacienteModel();

        // Obtener los pacientes filtrados
        $pacientes = $pacienteModel->filtrarPacientes($criterio, $filtro);

        // Cargar la vista con los resultados
        return view('modulopaciente/buscarpaciente', [
            'pacientes' => $pacientes
        ]);
    }


}