<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class menuController extends Controller
{
    public function showLogin()
    {
        return view('secciones.login');
    }

    public function showhorario()
    {
        return view('secciones.horario');
    }
}



?>