<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class menuController extends Controller
{
    public function showLogin()
    {
        return view('login.login');
    }

    public function showhorario()
    {
        return view('secciones.horario');
    }

    public function showgrid()
    {
        return view('secciones.grid');
    }

}



?>