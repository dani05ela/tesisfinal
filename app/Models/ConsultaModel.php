<?php
namespace App\Models;

use CodeIgniter\Model;

class ConsultaModel extends Model
{
    public function insertarConsulta(array $datosConsulta): bool
    {
        // Preparamos la consulta SQL para insertar la consulta
        $sql = "INSERT INTO tbl_consulta (con_fechaconsulta, con_motivoconsulta, con_sintomas, con_presionarterial, con_frecuenciacardiaca, con_temperatura, con_peso, con_altura, con_interrogatorio,info_id) 
            VALUES (:fecha:, :motivo:, :sintomas:, :presionarterial:, :frecuenciacardiaca:, :temperatura:, :peso:, :altura:, :interrogatorio:, :info_id:)";

        // Ejecutamos la consulta pasando los datos de la consulta como parámetros
        $query = $this->db->query($sql, $datosConsulta);

        // Retornamos si la inserción fue exitosa
        return $query ? true : false;
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