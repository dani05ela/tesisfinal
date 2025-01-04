<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function bienvenida(): string
    {
        return view('modulohistoriasclinicas/bienvenida'); // Controller para ir al dashboard
    }

    public function buscarpaciente(): string
    {
        return view('modulopaciente/buscarpaciente'); // Controller para ir al modulo de pacientes
    }

    public function buscadorhc(): string
    {
        return view('modulohistoriasclinicas/buscadorhc'); // Controller para ir al modulo de historias clinicas
    }

    public function nuevopaciente(): string
    {
        return view('modulopaciente/nuevopaciente'); // Controller para ir a la vista de nuevo paciente
    }


}