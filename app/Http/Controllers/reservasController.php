<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\reserve;
use App\Models\product;
use PhpParser\Node\Stmt\TryCatch;

class reservasController extends Controller
{
    public function añadir()
    {
        
        return view('reservas.añadir');
    }

    public function horasDisponibles($fecha)
    {
        
        $fechaSeleccionada = $fecha;


        $horas['horasInicio'] = ["08:00","08:55","09:50","11:15","12:10","13:05"];
        $horas['horasFin'] = ["08:55","09:50","11:15","12:10","13:05","14:00"];

        $hayReservas = reserve::where('dia', $fechaSeleccionada)->count();
        $reservas = reserve::where('dia', $fecha)->select('hora_inicio', 'hora_fin')->get();

        if($hayReservas == 0){
            $horas['horasInicio'] = ["08:00","08:55","09:50","11:15","12:10","13:05"];
            $horas['horasFin'] = ["08:55","09:50","11:15","12:10","13:05","14:00"];
        }
        else
        {
            foreach ($reservas as $reserva) {
                $horas['horasInicio'] = array_diff($horas['horasInicio'], [$reserva->hora_inicio]);
                $horas['horasFin'] = array_diff($horas['horasFin'], [$reserva->hora_fin]);
            }
        }

        return view('reservas.añadir', ['horas' => $horas, 'fecha' => $fechaSeleccionada]);
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
        $events = [];

        $todasReservas = reserve::all();


        foreach ($todasReservas as $reserva) {
            $events[] = [
                'title' => 'Reservation',
                'start' => $reserva->dia . 'T' . $reserva->hora_inicio,
                'end' => $reserva->dia . 'T' . $reserva->hora_fin,
            ];
        }

        return view('secciones.horario', compact('events'));
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
