<?php

namespace App\Http\Controllers;

use App\Models\classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\reserve;
use App\Models\product;
use App\Models\teacher;
use PhpParser\Node\Stmt\TryCatch;

class reservasController extends Controller
{
    public function añadir()
    {
        
        return view('reservas.añadir');
    }

    public function horasDisponibles($fecha)
    {
        $horas['horasInicio'] = ["08:00","08:55","09:50","11:15","12:10","13:05"];
        $horas['horasFin'] = ["08:55","09:50","11:15","12:10","13:05","14:00"];

        $hayReservas = reserve::where('dia', $fecha)->count();

        $reservas = reserve::where('dia', $fecha)
        ->selectRaw("TIME_FORMAT(hora_inicio, '%H:%i') as hora_inicio, TIME_FORMAT(hora_fin, '%H:%i') as hora_fin")
        ->get();

        if($hayReservas == 0){
            $horas['horasInicio'] = ["08:00","08:55","09:50","11:15","12:10","13:05"];
            $horas['horasFin'] = ["08:55","09:50","11:15","12:10","13:05","14:00"];
        }
        else
        {
            foreach ($reservas as $reserva) {
                $horas['horasInicio'] = array_diff($horas['horasInicio'], [$reserva['hora_inicio']]);
                $horas['horasFin'] = array_diff($horas['horasFin'], [$reserva['hora_fin']]);
            }
        }

        $aulas = classroom::all()->pluck('nombre');

        return view('reservas.añadir', ['horas' => $horas, 'fecha' => $fecha, 'aulas' => $aulas]);
    }

    public function horafecha($fecha, $aula)
    {
        $idaula =classroom::where('nombre', $aula)->first()->id;

        $horas['horasInicio'] = ["08:00","08:55","09:50","11:15","12:10","13:05"];
        $horas['horasFin'] = ["08:55","09:50","11:15","12:10","13:05","14:00"];

        $hayReservas = reserve::where('dia', $fecha)
        ->where('id_aula', $idaula)
        ->count();

        $reservas = reserve::where('dia', $fecha)
        ->where('id_aula', $idaula)
        ->select('hora_inicio', 'hora_fin')
        ->get();

        if($hayReservas == 0){
            $horas['horasInicio'] = ["08:00","08:55","09:50","11:15","12:10","13:05"];
            $horas['horasFin'] = ["08:55","09:50","11:15","12:10","13:05","14:00"];
        }
        else
        {
            foreach ($reservas as $reserva) {
                $horas['horasInicio'] = array_diff($horas['horasInicio'], [$reserva['hora_inicio']]);
                $horas['horasFin'] = array_diff($horas['horasFin'], [$reserva['hora_fin']]);
            }
        }
        $aulas = classroom::all()->pluck('nombre');
        return view('reservas.añadir', ['horas' => $horas, 'fecha' => $fecha, 'aulas' => $aulas, 'aulaSeleccionada' => $aula]);

    }

    public function store(Request $request)
    {

        $request->input('diaReserva', 'horaInicioReserva', 'horaFinalReserva', 'aula');
        
        if( empty($request->input('diaReserva')) )
        {
            dd('No se ha seleccionado una fecha');
        }

        $request->validate([
            'diaReserva' => 'required|date',
            'horaInicioReserva' => 'required',
            'horaFinalReserva' => 'required',
            'aula' => 'required'
        ]);

        $nuevaReserva = new reserve();
        $nuevaReserva->dia = $request->input('diaReserva');
        $nuevaReserva->hora_inicio = $request->input('horaInicioReserva');
        $nuevaReserva->hora_fin = $request->input('horaFinalReserva');
        $nuevaReserva->id_aula = classroom::where('nombre', $request->input('aula'))->first()->id;
        $nuevaReserva->id_profesor = teacher::where('email', session()->get('user'))->first()->id;
        $nuevaReserva->save();

        return redirect()->route('secciones.horario');
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
