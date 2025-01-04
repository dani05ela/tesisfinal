<?php

namespace App\Controllers;

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
}