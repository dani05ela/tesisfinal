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

    public function insertarReceta(array $datosReceta)
    {
        $sql = "INSERT INTO tbl_receta (rec_medicamento, rec_instrucciones, con_id) 
                VALUES (:medicamentos:, :instrucciones:, :con_id:)";

        $query = $this->db->query($sql, $datosReceta);

        return $query;

    }

    public function obtenerConsultaByInfoId($idInfoAdmin)
    {
        $sql = "SELECT * FROM tbl_consulta WHERE info_id = :idInfoAdmin:";
        $query = $this->db->query($sql, ['idInfoAdmin' => $idInfoAdmin]);
        return $query->getResultArray();
    }

    public function obtenerConsultaPorId($con_id)
    {
        $sql = "SELECT 
        c.*,
        ci.itc_id
    FROM 
        tbl_consulta c
    LEFT JOIN 
        tbl_consulta_itemcat ci 
    ON 
        c.con_id = ci.con_id
    WHERE 
        c.con_id = :con_id:";

        $query = $this->db->query($sql, ['con_id' => $con_id]);
        return $query->getResultArray(); // Devuelve los resultados como un array de objetos.
    }



    public function actualizarConsulta(int $idConsulta, array $datosConsulta, array $nuevosExamenes): bool
    {

        // Paso 1: Eliminar los exámenes anteriores de la tabla intermedia
        $sqlEliminar = "DELETE FROM tbl_consulta_itemcat WHERE con_id = :idConsulta:";
        $this->db->query($sqlEliminar, ['idConsulta' => $idConsulta]);

        // Paso 2: Insertar los nuevos exámenes en la tabla intermedia
        foreach ($nuevosExamenes as $examenId) {
            $sqlInsertar = "INSERT INTO tbl_consulta_itemcat (con_id, itc_id) 
                            VALUES (:idConsulta:, :idExamen:)";

            $datosInsertar = [
                'idConsulta' => $idConsulta,
                'idExamen' => $examenId,
            ];

            $this->db->query($sqlInsertar, $datosInsertar);

        }

        // Paso 3: Actualizar la tabla `tbl_consulta` (si es necesario)
        $sqlActualizarConsulta = "UPDATE tbl_consulta 
                                   SET con_fechaconsulta = :fecha:,
                                       con_motivoconsulta = :motivo:,
                                       con_sintomas = :sintomas:,
                                       con_presionarterial = :presionarterial:,
                                       con_frecuenciacardiaca = :frecuenciacardiaca:,
                                       con_temperatura = :temperatura:,
                                       con_peso = :peso:,
                                       con_altura = :altura:,
                                       con_interrogatorio = :interrogatorio:
                                   WHERE con_id = :idConsulta:";

        $datosActualizar = array_merge($datosConsulta, ['idConsulta' => $idConsulta]);

        $resp = $this->db->query($sqlActualizarConsulta, $datosActualizar);

        if($resp){
            return true;
        } else {
            return false;
        }
    }

    public function obtenerRecetaPorConsulta($con_id)
    {
        $sql = "SELECT * FROM tbl_receta WHERE con_id = :con_id:";
        $query = $this->db->query($sql, ['con_id' => $con_id]);
        return $query->getResultArray();
    }

    public function actualizarReceta(int $idReceta, array $datosReceta): bool
    {
        $sql = "UPDATE tbl_receta 
                SET rec_medicamento = :medicamentos:,
                    rec_instrucciones = :instrucciones:
                WHERE rec_id = :idReceta:";

        $datos = array_merge($datosReceta, ['idReceta' => $idReceta]);

        $query = $this->db->query($sql, $datos);

        return $query;
    }



}