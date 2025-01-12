<?php
namespace App\Models;

use CodeIgniter\Model;

class PacienteModel extends Model
{
    // Definir la variable $table que contendrá el nombre de la tabla
    protected $table = 'tbl_infoadministrativa'; // Este es el valor predeterminado que puedes cambiar según sea necesario

    // Método para obtener el último ID
    public function obtenerUltimoId(): int
    {
        // Usar la variable $table para referirse a la tabla
        $sql = "SELECT MAX(info_id) as last_id FROM " . $this->table;

        // Ejecutamos la consulta
        $query = $this->db->query($sql);

        // Obtenemos el valor del último ID
        $row = $query->getRow();

        // Verificar si la propiedad last_id es NULL
        if ($row->last_id === null) {
            return 0; // Si no hay registros, devolvemos 0
        } else {
            return (int) $row->last_id; // Devolvemos el último ID como entero
        }
    }

    public function insertarInformacionAdministrativa(array $datosAdministrativos): bool
    {
        // Preparamos la consulta SQL para insertar los datos administrativos
        $sql = "INSERT INTO tbl_infoadministrativa (info_fechacreacion, info_institucion, info_medicoresponsable) 
            VALUES (:fecha_creacion:, :institucion:, :medico_responsable:)";


        // Ejecutamos la consulta pasando los datos administrativos como parámetros
        $query = $this->db->query($sql, $datosAdministrativos);

        // Retornamos si la inserción fue exitosa
        return $query ? true : false;
    }

    public function insertarPaciente(array $datosPaciente): bool
    {
        // Preparamos la consulta SQL para insertar el paciente, incluyendo el documento PDF
        $sql = "INSERT INTO tbl_paciente (pac_apellidos, pac_nombres, pac_fechanacimiento, pac_edad, pac_genero, pac_cedula, 
                            pac_documentopdf, pac_nivelinstruccion, pac_ocupacion, pac_estadocivil, pac_telefono, pac_email, pac_direccion, 
                            pac_peso, pac_talla, pac_imc, pac_antecedentesalergicos, pac_cirugias, pac_antecedentespersonales, 
                            pac_antecedentesfamiliares, pac_nombreemergencia, pac_relacionemergencia, pac_telefonoemergencia)
                     VALUES (:apellidos:, :nombres:, :fecha_nacimiento:, :edad:, :genero:, :cedula:, :documentos:,
                            :nivel_instruccion:, :ocupacion:, :estado_civil:, :telefono:, :email:, :direccion:, :peso:, :talla:, :imc:, 
                            :antecedentes_alergicos:, :cirugias_previas:, :antecedentes_personales:, :antecedentes_familiares:, 
                            :contacto_nombre:, :contacto_relacion:, :contacto_telefono:)";

        // Ejecutamos la consulta pasando los datos del paciente como parámetros
        $query = $this->db->query($sql, $datosPaciente);

        // Retornamos si la inserción fue exitosa
        return $query ? true : false;
    }

    public function updateInfoAdmin(): bool
    {
        $sql = "UPDATE tbl_infoadministrativa SET pac_id = (SELECT MAX(pac_id) FROM tbl_paciente)";

        $query = $this->db->query($sql);

        return $query ? true : false;
    }

    public function obtenerUltimosPacientes()
    {

        $sql = "SELECT * FROM tbl_paciente ORDER BY pac_id DESC LIMIT 3";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function filtrarPacientes($criterio, $filtro)
    {
        // Escapar el criterio para prevenir inyecciones SQL
        $criterio = $this->db->escapeLikeString($criterio);

        // Construir la consulta SQL según el filtro seleccionado
        $sql = "SELECT pac_id, pac_apellidos, pac_nombres, pac_cedula FROM tbl_paciente WHERE ";

        switch ($filtro) {
            case 'cedula':
                $sql .= "pac_cedula LIKE '%$criterio%'";
                break;
            case 'nombres':
                $sql .= "pac_nombres LIKE '%$criterio%'";
                break;
            case 'apellidos':
                $sql .= "pac_apellidos LIKE '%$criterio%'";
                break;
            default:
                return []; // Retornar un array vacío si el filtro no es válido
        }

        // Ejecutar la consulta
        $query = $this->db->query($sql);

        // Retornar los resultados como un array
        return $query->getResultArray();
    }



}
