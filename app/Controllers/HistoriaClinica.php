<?php

namespace App\Controllers;

class HistoriaClinica extends BaseController
{
    public function resumenpaciente(): string
    {
        return view('modulohistoriasclinicas/resumenpaciente'); // Controller para ir al historia clinica
    }

    public function historiaclinica(): string
    {
        
        return view('modulohistoriasclinicas/historiaclinica'); // Controller para ir al historia clinica
    }

    public function nuevacita(): string
    {
        return view('modulohistoriasclinicas/nuevacita'); // Controller para ir al historia clinica
    }

    public function receta(): string
    {
        return view('modulohistoriasclinicas/receta'); // Controller para ir al historia clinica
    }

}