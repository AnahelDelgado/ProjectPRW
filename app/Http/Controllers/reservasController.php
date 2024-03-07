<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class reservasController extends Controller
{
    public function reservar1()
    {
        return view('reservas.añadir');   
    }

    public function reserva2()
    {
        return view('secciones.reserva2');
    }

    public function eleccionreserva()
    {
        return view('login.eleccion');
    }

    public function reserva3()
    {

        return view('secciones.reserva3');

    }


    public function misReservas()
    {

        return view('secciones.misReservas');

    }
}



?>