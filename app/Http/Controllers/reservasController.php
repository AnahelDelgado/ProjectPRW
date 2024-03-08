<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\reserve;
use App\Models\product;

class reservasController extends Controller
{
    public function añadir()
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

    public function index()
    {
        $todasReservas = reserve::all();

        $reservas = [];

        foreach ($todasReservas as $reserva) {
            $reservas[] = [
                'id_profesor' => $reserva->id_profesor,
                'id_aula' => $reserva->id_aula,
                'dia' => $reserva->dia,
                'hora_inicio' => $reserva->hora_inicio,
                'hora_fin' => $reserva->hora_fin
            ];
        }
        return view('secciones.horario', compact('reservas'));
    }



    //editar
    public function editar()
    {

        return view('reservas.editar');
    }


    public function editarMaterial()
    {

        return view('secciones.editarMaterial');
    }

    //eliminar

    public function eliminar()
    {

       return view('reservas.eliminar');
    }

    public function eliminarMaterial()
    {

       return view('secciones.eliminarMaterial');
    }




    //eleccion editar


    public function eleccioneditar()
    {

       return view('reservas.eleccioneditar');
    }


    //eleccion eliminar


  public function eleccioneliminar()
    {

       return view('reservas.eleccioneliminar');
    }

}
