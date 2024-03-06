<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class menuController extends Controller
{
    public function reserva1()
    {
        return view('secciones.layout');
    }

    public function reserva2()
    {
        return view('secciones.layout');
    }

}



?>