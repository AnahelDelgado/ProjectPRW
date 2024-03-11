<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\event;
use App\Models\product;

class EventController extends Controller
{
    public function añadir()
    {
        return view('reservas.añadir');
    }

    public function reserva2()
    {
        $viewData = [];
        $viewData["products"] = Product::all();
        return view('secciones.reserva2')->with("viewData", $viewData);
    }

    public function reservaPrueba()
    {
        return view('secciones.reservaPrueba');
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
        $events = array();
        $bookings = Event::all();
        foreach($bookings as $evento){
            $events[] = [
                'title' => 'Reservation',
                'id_profesor' => $evento->id_profesor,
                'id_aula' => $evento->id_aula,
                'start' => $evento->start_date,
                'end' => $evento->end_date
            ];

            return view('secciones.horario', ['events' => $events]);
        }
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
