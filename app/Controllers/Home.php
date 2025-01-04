<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message'); // Vista de bienvenida
    }

    public function inicio(): string
    {
        return view('main/inicio'); // Vista de inicio
    }

    public function servicios(): string
    {
        return view('main/servicios'); // Vista de servicios
    }

    public function contacto(): string
    {
        return view('main/contacto'); // Vista de contacto
    }
    
}