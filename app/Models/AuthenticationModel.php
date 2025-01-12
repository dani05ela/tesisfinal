<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthenticationModel extends Model
{

    // Verificar si el usuario y la contraseña existen en la base de datos
    public function login($username, $password): bool
    {
        // Sentencia SQL para obtener el usuario por su nombre
        $sql = "SELECT * FROM tbl_login WHERE log_nombre = :username:";
    
        // Ejecutamos la consulta
        $query = $this->db->query($sql, ['username' => $username]);
    
        // Obtenemos el registro del usuario
        $user = $query->getRow();
    
        // Verificar si el usuario fue encontrado
        if ($user) {
            // Validar la contraseña utilizando password_verify
            if (password_verify($password, $user->log_contrasenia)) {
                return true;  // Usuario y contraseña válidos
            }
        }
    
        return false;  // Usuario no encontrado o contraseña incorrecta
    }
    

    public function insertUser($data): bool
    {
        // Preparamos la sentencia SQL para insertar un nuevo usuario
        $sql = "INSERT INTO tbl_login (log_nombre, log_apellido, log_email, log_telefono, log_contrasenia) 
                VALUES (:nombre:, :apellidos:, :email:, :telefono:, :password:)";

        // Ejecutamos la consulta de inserción
        $this->db->query($sql, [
            'nombre' => $data['username'],
            'apellidos' => $data['apellidos'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
            'password' => $data['password'],  // Aquí usamos la contraseña ya hasheada
        ]);

        // Verificamos si la inserción fue exitosa
        if ($this->db->affectedRows() > 0) {
            return true;  // Si la fila se insertó correctamente
        }

        return false;  // Si hubo un problema al insertar
    }
}
