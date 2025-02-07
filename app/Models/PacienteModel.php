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
        $sql = "UPDATE tbl_infoadministrativa  SET pac_id = (SELECT MAX(pac_id) FROM tbl_paciente) 
        WHERE info_id = (SELECT MAX(info_id) FROM tbl_infoadministrativa);
";

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

    public function getPacienteInfo($pac_id): array
    {
        $sql = "SELECT 
    i.info_id,
    i.info_fechaCreacion,
    i.info_institucion,
    i.info_medicoResponsable,
    p.pac_id,
    p.pac_apellidos,
    p.pac_nombres,
    p.pac_fechaNacimiento,
    p.pac_edad,
    p.pac_genero,
    p.pac_cedula,
    p.pac_documentoPdf,
    p.pac_nivelInstruccion,
    p.pac_ocupacion,
    p.pac_estadoCivil,
    p.pac_telefono,
    p.pac_email,
    p.pac_direccion,
    p.pac_peso,
    p.pac_talla,
    p.pac_imc,
    p.pac_antecedentesAlergicos,
    p.pac_cirugias,
    p.pac_antecedentesPersonales,
    p.pac_antecedentesFamiliares,
    p.pac_nombreEmergencia,
    p.pac_relacionEmergencia,
    p.pac_telefonoEmergencia
FROM 
    tbl_infoadministrativa i
LEFT JOIN 
    tbl_paciente p ON i.pac_id = p.pac_id
WHERE 
    p.pac_id = $pac_id";

        $query = $this->db->query($sql, [$pac_id]);

        return $query->getRowArray();
    }

    public function updatePaciente($pac_id, array $datosPaciente): bool
    {
        // Preparamos la consulta SQL para actualizar los datos del paciente
        $sql = "UPDATE tbl_paciente
                SET
                    pac_apellidos = :apellidos:,
                    pac_nombres = :nombres:,
                    pac_fechanacimiento = :fecha_nacimiento:,
                    pac_edad = :edad:,
                    pac_genero = :genero:,
                    pac_cedula = :cedula:,
                    pac_documentopdf = :documentos:,
                    pac_nivelinstruccion = :nivel_instruccion:,
                    pac_ocupacion = :ocupacion:,
                    pac_estadocivil = :estado_civil:,
                    pac_telefono = :telefono:,
                    pac_email = :email:,
                    pac_direccion = :direccion:,
                    pac_peso = :peso:,
                    pac_talla = :talla:,
                    pac_imc = :imc:,
                    pac_antecedentesalergicos = :antecedentes_alergicos:,
                    pac_cirugias = :cirugias_previas:,
                    pac_antecedentespersonales = :antecedentes_personales:,
                    pac_antecedentesfamiliares = :antecedentes_familiares:,
                    pac_nombreemergencia = :contacto_nombre:,
                    pac_relacionemergencia = :contacto_relacion:,
                    pac_telefonoemergencia = :contacto_telefono:
                WHERE pac_id = :pac_id:";

        // Incluimos pac_id en los parámetros de la consulta
        $datosPaciente['pac_id'] = $pac_id;

        // Ejecutamos la consulta pasando los datos del paciente como parámetros
        $query = $this->db->query($sql, $datosPaciente);

        // Retornamos si la actualización fue exitosa
        return $query ? true : false;
    }

    public function buscadorHistoriasClinicas($criterio, $valorBusqueda)
    {

        // Construir la consulta SQL basada en el criterio
        $sql = "SELECT 
                    ia.info_id,
                    p.pac_id,
                    p.pac_nombres,
                    p.pac_apellidos,
                    p.pac_cedula,
                    c.con_id,
                    c.con_fechaconsulta
                FROM 
                    tbl_infoadministrativa ia
                JOIN 
                    tbl_paciente p ON ia.pac_id = p.pac_id
                LEFT JOIN 
                    tbl_consulta c ON ia.info_id = c.info_id
                WHERE ";

        // Determinar el campo según el criterio seleccionado
        switch ($criterio) {
            case 'cedula':
                $sql .= "p.pac_cedula LIKE '%$valorBusqueda%'";
                break;
            case 'nombres':
                $sql .= "p.pac_nombres LIKE '%$valorBusqueda%'";
                break;
            case 'apellidos':
                $sql .= "p.pac_apellidos LIKE '%$valorBusqueda%'";
                break;
        }

        // Agregar el orden y el límite
        $sql .= " ORDER BY c.con_id DESC LIMIT 1";

        // Ejecutar la consulta
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function pacientesfrecuentes()
    {
        $sql = "SELECT 
                    p.pac_id, 
                    p.pac_nombres, 
                    p.pac_apellidos,
                    p.pac_cedula,
                    COUNT(c.info_id) AS frecuencia
                FROM 
                    tbl_paciente p
                JOIN 
                    tbl_infoadministrativa ia ON p.pac_id = ia.pac_id
                JOIN 
                    tbl_consulta c ON ia.info_id = c.info_id
                GROUP BY 
                    p.pac_id, p.pac_nombres, p.pac_apellidos
                ORDER BY 
                    frecuencia DESC
                LIMIT 4;
                ";

        $query = $this->db->query($sql);
        return $query->getResultArray();
    }


}
