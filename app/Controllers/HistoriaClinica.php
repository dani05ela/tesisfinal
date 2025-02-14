<?php

namespace App\Controllers;
use App\Models\PacienteModel;
use App\Models\ConsultaModel;

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
        $consultasModel = new ConsultaModel();
        $session = session(); // Inicia la sesión

        // Obtener el ID del paciente desde el POST
        $pac_id = $this->request->getPost('pac_id');

        // Guardar el ID en la sesión
        $session->set('pac_id', $pac_id);

        // Obtener los datos del paciente desde el modelo
        $data = $model->getPacienteInfo($pac_id);
        $info_id = $data['info_id'];
        $dataConsulta = $consultasModel->obtenerConsultaByInfoId($info_id);

        return view('modulohistoriasclinicas/historiaclinica', ['data' => $data, 'consultas' => $dataConsulta]); // Controller para ir al historia clinica
    }

    public function editarPaciente(): string
    {
        $pac_id = $this->request->getPost('pac_id');
        $model = new PacienteModel();
        $data = $model->getPacienteInfo($pac_id);
        return view('modulopaciente/update/updatePaciente', ['data' => $data]); // Controller para ir al historia clinica
    }

    public function regreso()
    {
        $session = session(); // Iniciar la sesión
        $model = new ConsultaModel();
        $pacienteModel = new PacienteModel();

        // Recuperamos el pac_id desde la sesión
        $pac_id = $session->get('pac_id');
        // Si no hay pac_id en la sesión, redirigir con un error
        if (!$pac_id) {
            return redirect()->to(base_url('bienvenida'))->with('error', 'No se encontró el paciente en la sesión');
        }
        $data = $pacienteModel->getPacienteInfo($pac_id);
        $info_id = $data['info_id'];
        $dataConsulta = $model->obtenerConsultaByInfoId($info_id);

        // Retornar la vista de la historia clínica con los datos actualizados
        return view('modulohistoriasclinicas/historiaclinica', [
            'data' => $data,
            'consultas' => $dataConsulta
        ]);
    }

    public function actualizarpaciente()
    {

        $session = session(); // Iniciar la sesión
        $modelSession = new ConsultaModel();
        $pacienteModelSession = new PacienteModel();

        // Recuperamos el pac_id desde la sesión
        $pac_id_session = $session->get('pac_id');
        // Si no hay pac_id en la sesión, redirigir con un error
        if (!$pac_id_session) {
            return redirect()->to(base_url('bienvenida'))->with('error', 'No se encontró el paciente en la sesión');
        }

        $pac_id = $this->request->getPost('pac_id');

        $nombre_imagen = $_FILES['documentos']['name'];
        $temporal = $_FILES['documentos']['tmp_name'];

        if (!empty($nombre_imagen)) {
            // Se sube un nuevo documento
            $nombrediferencia = date('dhms');
            $nombrefinal = $nombrediferencia . $nombre_imagen;
            $carpetaDestino = 'assets/almacenamientoUpdate';
            $ruta = $carpetaDestino . '/' . $nombrefinal;
            move_uploaded_file($temporal, $ruta);
        } else {
            // No se subió un nuevo archivo, se mantiene el actual
            $ruta = $this->request->getPost('documento_actual');
        }

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
            'documentos' => $ruta,  // Se guarda el documento nuevo o el actual

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
 

        $dataSession = $pacienteModelSession->getPacienteInfo($pac_id);
        $info_id = $dataSession['info_id'];
        $dataConsultaSession = $modelSession->obtenerConsultaByInfoId($info_id);


        if ($resultado) {
            return view('modulohistoriasclinicas/historiaclinica', [
                'data' => $dataSession,
                'consultas' => $dataConsultaSession
            ]);
        } else {
            return redirect()->to(base_url('error'))->with('error', 'Error al guardar el paciente.');
        }
    }




    public function nuevaConsulta()
    {
        $info_id = $this->request->getPost('pac_id');
        return view('modulohistoriasclinicas/nuevacita', ['info_id' => $info_id]); // Controller para ir al historia clinica
    }

    public function insertarconsulta()
    {
        // Recogemos los datos del formulario
        $info_id = $this->request->getPost('info_id'); // ID de la historia clinica
        $fechaConsulta = $this->request->getPost('fechaConsulta'); // Fecha de la consulta
        $motivoConsulta = $this->request->getPost('motivoConsulta'); // Motivo de la consulta
        $sintomas = $this->request->getPost('sintomas'); // Síntomas
        $presionArterial = $this->request->getPost('presionArterial'); // Presión arterial
        $frecuenciaCardiaca = $this->request->getPost('frecuenciaCardiaca'); // Frecuencia cardíaca
        $temperatura = $this->request->getPost('temperatura'); // Temperatura
        $peso = $this->request->getPost('peso'); // Peso
        $altura = $this->request->getPost('altura'); // Altura
        $interrogatorio = $this->request->getPost('interrogatorio'); // Interrogatorio

        // Recogemos los exámenes seleccionados (IDs de los exámenes)
        $examenesSeleccionados = $this->request->getPost('examenes'); // Esto debería ser un array

        // Creamos el array de datos para la consulta
        $datosConsulta = [
            'fecha' => $fechaConsulta,
            'motivo' => $motivoConsulta,
            'sintomas' => $sintomas,
            'presionarterial' => $presionArterial,
            'frecuenciacardiaca' => $frecuenciaCardiaca,
            'temperatura' => $temperatura,
            'peso' => $peso,
            'altura' => $altura,
            'interrogatorio' => $interrogatorio,
            'info_id' => $info_id
        ];

        $model = new ConsultaModel();
        // Ahora llamamos al método que inserta la consulta y los exámenes
        $resultado = $model->insertarFormularioConsulta($datosConsulta, $examenesSeleccionados);
        $idConsulta = $model->obtenerIdConsulta();

        if ($resultado) {
            return view('modulohistoriasclinicas/receta', ['idConsulta' => $idConsulta]);
        } else {
            return view('modulohistoriasclinicas/bienvenida');
        }
    }



    public function guardarReceta()
    {
        // Asegurarse de que los datos del formulario estén disponibles
        $datosReceta = [
            'medicamentos' => $this->request->getPost('medicamentos'),
            'instrucciones' => $this->request->getPost('instrucciones'),
            'con_id' => $this->request->getPost('idConsulta') // Aquí tomas el valor de info_id enviado en el formulario
        ];

        // Llamar al modelo para insertar la receta
        $model = new ConsultaModel();
        $resultado = $model->insertarReceta($datosReceta);

        if ($resultado) {
            return redirect()->to(base_url('bienvenida'))->with('success', 'Receta guardada exitosamente');

        } else {
            // Si hubo un error en la inserción, puedes mostrar un mensaje o redirigir
            return redirect()->to(base_url('bienvenida'))->with('error', 'Ups algo salió mal');

        }
    }

    public function editarconsulta(): string
    {
        $con_id = $this->request->getPost('con_id');
        $model = new ConsultaModel();
        $data = $model->obtenerConsultaPorId($con_id);
        $examenesSeleccionados = array_column($data, 'itc_id');

        return view('modulohistoriasclinicas/update/updateConsulta', ['datos' => $data, 'examenesSeleccionados' => $examenesSeleccionados]); // Controller para ir al historia clinica
    }

    public function actualizarconsulta()
    {
        $session = session(); // Iniciar la sesión
        $model = new ConsultaModel();
        $pacienteModel = new PacienteModel();

        // Recuperamos el pac_id desde la sesión
        $pac_id = $session->get('pac_id');

        // Si no hay pac_id en la sesión, redirigir con un error
        if (!$pac_id) {
            return redirect()->to(base_url('bienvenida'))->with('error', 'No se encontró el paciente en la sesión');
        }
        // Recogemos los datos del formulario
        $con_id = $this->request->getPost('con_id');
        $fechaConsulta = $this->request->getPost('fechaConsulta'); // Fecha de la consulta
        $motivoConsulta = $this->request->getPost('motivoConsulta'); // Motivo de la consulta
        $sintomas = $this->request->getPost('sintomas'); // Síntomas
        $presionArterial = $this->request->getPost('presionArterial'); // Presión arterial
        $frecuenciaCardiaca = $this->request->getPost('frecuenciaCardiaca'); // Frecuencia cardíaca
        $temperatura = $this->request->getPost('temperatura'); // Temperatura
        $peso = $this->request->getPost('peso'); // Peso
        $altura = $this->request->getPost('altura'); // Altura
        $interrogatorio = $this->request->getPost('interrogatorio'); // Interrogatorio

        // Recogemos los exámenes seleccionados (IDs de los exámenes)
        $examenesSeleccionados = $this->request->getPost('examenes'); // Esto debería ser un array

        // Creamos el array de datos para la consulta
        $datosConsulta = [
            'fecha' => $fechaConsulta,
            'motivo' => $motivoConsulta,
            'sintomas' => $sintomas,
            'presionarterial' => $presionArterial,
            'frecuenciacardiaca' => $frecuenciaCardiaca,
            'temperatura' => $temperatura,
            'peso' => $peso,
            'altura' => $altura,
            'interrogatorio' => $interrogatorio,
            'con_id' => $con_id
        ];

        $carpetaDestino = 'assets/almacenamientoUpdate/';
        $archivosSubidos = []; // Para almacenar las rutas de los archivos

        foreach ($_FILES['pdf_examenes']['name'] as $key => $nombreArchivo) {
            $temporal = $_FILES['pdf_examenes']['tmp_name'][$key];

            if ($temporal) { // Verifica que el archivo fue subido correctamente
                $nombrediferencia = date('dhms') . "_" . $nombreArchivo;
                $ruta = $carpetaDestino . $nombrediferencia;

                if (move_uploaded_file($temporal, $ruta)) {
                    $archivosSubidos[] = $ruta; // Guarda la ruta en el array
                }
            }
        }

        $model = new ConsultaModel();
        // Ahora llamamos al método que inserta la consulta y los exámenes
        $resultado = $model->actualizarConsulta($con_id, $datosConsulta, $examenesSeleccionados, $archivosSubidos);

        if ($resultado) {
            // Obtener los datos del paciente nuevamente
            $data = $pacienteModel->getPacienteInfo($pac_id);
            $info_id = $data['info_id'];
            $dataConsulta = $model->obtenerConsultaByInfoId($info_id);

            // Retornar la vista de la historia clínica con los datos actualizados
            return view('modulohistoriasclinicas/historiaclinica', [
                'data' => $data,
                'consultas' => $dataConsulta
            ]);
            // return redirect()->to(base_url('bienvenida'))->with('success', 'Consulta actualizada exitosamente');
        } else {
            return redirect()->to(base_url('bienvenida'))->with('error', 'Error al actualizar la consulta');
        }
    }

    public function editarreceta()
    {
        $con_id = $this->request->getPost('con_id');
        $model = new ConsultaModel();
        $data = $model->obtenerRecetaPorConsulta($con_id);

        return view('modulohistoriasclinicas/update/updateReceta', ['data' => $data]); // Controller para ir al historia clinica
    }

    public function updatereceta()
    {
        $session = session(); // Iniciar la sesión
        $model = new ConsultaModel();
        $pacienteModel = new PacienteModel();

        // Recuperamos el pac_id desde la sesión
        $pac_id = $session->get('pac_id');

        // Si no hay pac_id en la sesión, redirigir con un error
        if (!$pac_id) {
            return redirect()->to(base_url('bienvenida'))->with('error', 'No se encontró el paciente en la sesión');
        }
        // Asegurarse de que los datos del formulario estén disponibles
        $datosReceta = [
            'medicamentos' => $this->request->getPost('medicamentos'),
            'instrucciones' => $this->request->getPost('instrucciones'),
        ];

        $recetaid = $this->request->getPost('recetaid');
        // Llamar al modelo para insertar la receta
        $model = new ConsultaModel();
        $resultado = $model->actualizarReceta($recetaid, $datosReceta);

        if ($resultado) {
            // Obtener los datos del paciente nuevamente
            $data = $pacienteModel->getPacienteInfo($pac_id);
            $info_id = $data['info_id'];
            $dataConsulta = $model->obtenerConsultaByInfoId($info_id);

            // Retornar la vista de la historia clínica con los datos actualizados
            return view('modulohistoriasclinicas/historiaclinica', [
                'data' => $data,
                'consultas' => $dataConsulta
            ]);

            // return redirect()->to(base_url('bienvenida'))->with('success', 'Receta actualizada exitosamente');

        } else {
            // Si hubo un error en la inserción, puedes mostrar un mensaje o redirigir
            return redirect()->to(base_url('bienvenida'))->with('error', 'Ups algo salió mal');

        }
    }


    public function filtrarhistoriasclinicas()
    {
        $model = new PacienteModel();

        // Obtener el criterio de búsqueda y el valor desde el POST
        $criterio = $this->request->getPost('criterio');
        $valorBusqueda = $this->request->getPost('valorBusqueda');

        // Llamar al método del modelo que busca las historias clínicas
        $resultados = $model->buscadorHistoriasClinicas($criterio, $valorBusqueda);

        //var_dump($resultados);

        // Cargar la vista con los resultados de la búsqueda
        return view('modulohistoriasclinicas/buscadorhc', ['resultados' => $resultados]);

    }


}