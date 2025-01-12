<?php

namespace App\Controllers;
use App\Models\AuthenticationModel;

class Login extends BaseController
{
    public function iniciosesion(): string
    {
        return view('iniciosesion/iniciosesion'); // Vista de inicio de sesión
    }

    public function registrousu(): string
    {
        return view('iniciosesion/registrousu'); // Vista de registro de usuario
    }

    public function login(): string
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Instanciar el modelo de autenticación
        $authModel = new AuthenticationModel();

        // Verificar si el usuario existe
        if ( $authModel->login($username, $password)) {
            return view('modulohistoriasclinicas/bienvenida');
        } else {
            return view('iniciosesion/iniciosesion', ['error' => 'Usuario o contraseña incorrectos.']);
        }
    }

    public function register(): string
    {
        // Obtienes los datos del formulario
        $nombres = $this->request->getPost('nombres');
        $apellidos = $this->request->getPost('apellidos');
        $email = $this->request->getPost('email');
        $telefono = $this->request->getPost('telefono');
        $password = $this->request->getPost('password');

        // El nombre del usuario es simplemente el valor ingresado en el campo 'nombres'
        $username = $nombres;  // Aquí solo usamos 'nombres' como el username

        // Validar si el correo ya existe
        $model = new AuthenticationModel();

        // Hash de la contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Inserta los datos en la base de datos
        $data = [
            'username' => $username,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'email' => $email,
            'telefono' => $telefono,
            'password' => $hashedPassword,
        ];

        if ($model->insertUser($data)) {
            // Usuario registrado con éxito
            return view('iniciosesion/iniciosesion', ['message' => 'Usuario registrado con éxito']);
        } else {
            // Error al registrar usuario
            return view('iniciosesion/registrousu', ['error' => 'No se pudo registrar el usuario. Intente nuevamente.']);
        }
    }

}