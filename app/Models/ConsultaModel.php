<?php
namespace App\Models;

use CodeIgniter\Model;

class ConsultaModel extends Model
{
    public function insertarFormularioConsulta(array $datosConsulta, array $examenesSeleccionados): bool
    {
        // 1. Insertamos la consulta en la tabla tbl_consulta
        $sqlConsulta = "INSERT INTO tbl_consulta 
                        (con_fechaConsulta, con_motivoConsulta, con_sintomas, 
                         con_presionArterial, con_frecuenciaCardiaca, con_temperatura, 
                         con_peso, con_altura, con_interrogatorio, info_id) 
                        VALUES (:fecha:, :motivo:, :sintomas:, :presionarterial:, 
                                :frecuenciacardiaca:, :temperatura:, :peso:, :altura:, 
                                :interrogatorio:, :info_id:)";

        $queryConsulta = $this->db->query($sqlConsulta, $datosConsulta);

        if ($queryConsulta) {
            // 2. Recuperamos el ID de la consulta recién insertada
            $idConsulta = $this->obtenerIdConsulta(); // Aquí asumo que ya tienes el método `obtenerIdConsulta`

            // 3. Insertamos los exámenes seleccionados en la tabla intermedia tbl_consulta_itemcat
            foreach ($examenesSeleccionados as $examenId) {
                $sqlItemCat = "INSERT INTO tbl_consulta_itemcat (con_id, itc_id) 
                               VALUES (:con_id:, :item_id:)";

                // Preparamos los datos para cada examen
                $datosItemCat = [
                    'con_id' => $idConsulta,
                    'item_id' => $examenId
                ];
                
                // Ejecutamos la consulta para cada examen
                $queryItemCat = $this->db->query($sqlItemCat, $datosItemCat);

                if (!$queryItemCat) {
                    return false; // Si algún insert de examen falla, devolvemos false
                }
            }

            return true; // Si todo fue exitoso, devolvemos true
        }

        return false; // Si el insert de la consulta falla, devolvemos false
    }



    public function obtenerIdConsulta()
    {
        // Usar la variable $table para referirse a la tabla
        $sql = "SELECT con_id 
                FROM tbl_consulta 
                ORDER BY con_id DESC 
                LIMIT 1";

        // Ejecutamos la consulta
        $query = $this->db->query($sql);

        // Obtenemos el valor del último ID
        $row = $query->getRow();

        return $row->con_id;
    }
}