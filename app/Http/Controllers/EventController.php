<?php

namespace App\Http\Controllers;

use App\Models\classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\event;
use App\Models\product;
use App\Models\teacher;
use PhpParser\Node\Stmt\TryCatch;

class EventController extends Controller
{
    public function añadir()
    {
        return view('reservas.añadir');
    }

    public function horasDisponibles($fecha)
    {


        $horas['horasInicio'] = ["08:00","08:55","09:50","11:15","12:10","13:05"];
        $horas['horasFin'] = ["08:55","09:50","11:15","12:10","13:05","14:00"];

        $hayReservas = event::where('dia', $fecha)->count();

        $reservas = event::where('dia', $fecha)
            ->selectRaw("TIME_FORMAT(hora_inicio, '%H:%i') as hora_inicio, TIME_FORMAT(hora_fin, '%H:%i') as hora_fin")
            ->get();

        if ($hayReservas == 0) {
            $horas['horasInicio'] = ["08:00", "08:55", "09:50", "11:15", "12:10", "13:05"];
            $horas['horasFin'] = ["08:55", "09:50", "11:15", "12:10", "13:05", "14:00"];
        } else {
            foreach ($reservas as $reserva) {
                $horas['horasInicio'] = array_diff($horas['horasInicio'], [$reserva['hora_inicio']]);
                $horas['horasFin'] = array_diff($horas['horasFin'], [$reserva['hora_fin']]);
            }
        }

        $aulas = classroom::all()->pluck('nombre');
        $primerAula = classroom::first()->nombre;



        return view('reservas.añadir', ['horas' => $horas, 'fecha' => $fecha, 'aulas' => $aulas, 'primerAula' => $primerAula]);
    }

    public function horafecha($fecha, $aula)
    {
        $idaula = classroom::where('nombre', $aula)->first()->id;


        $horas['horasInicio'] = ["08:00","08:55","09:50","11:15","12:10","13:05"];
        $horas['horasFin'] = ["08:55","09:50","11:15","12:10","13:05","14:00"];

        $hayReservas = event::where('dia', $fecha)
            ->where('id_aula', $idaula)
            ->count();

        $reservas = event::where('dia', $fecha)
        ->where('id_aula', $idaula)
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

        return view('reservas.añadir', ['horas' => $horas, 'fecha' => $fecha, 'aulas' => $aulas, 'aulaSeleccionada' => $aula]);
    }

    public function store(Request $request)
    {

        $request->input('diaReserva', 'horaInicioReserva', 'horaFinalReserva', 'aula');

        if (empty($request->input('diaReserva'))) {
            dd('No se ha seleccionado una fecha');
        }

        $request->validate([
            'diaReserva' => 'required|date',
            'horaInicioReserva' => 'required',
            'horaFinalReserva' => 'required',
            'aula' => 'required'
        ]);

        $nuevaReserva = new event();
        $nuevaReserva->dia = $request->input('diaReserva');
        $nuevaReserva->hora_inicio = $request->input('horaInicioReserva');
        $nuevaReserva->hora_fin = $request->input('horaFinalReserva');
        $nuevaReserva->id_aula = classroom::where('nombre', $request->input('aula'))->first()->id;
        $nuevaReserva->id_profesor = teacher::where('email', session()->get('user'))->first()->id;
        $nuevaReserva->save();

        return redirect()->route('secciones.index');
    }


    public function eliminarReserva(Request $request)
    {
        $request->validate([
            'reserva' => 'required|exists:events,id'
        ]);

        try {
            $idReserva = $request->input('reserva');
            $reserva = event::findOrFail($idReserva);
            $reserva->delete();
            return redirect()->route('reservas.eliminar')->with('success', 'Reserva eliminada correctamente');
        } catch (\Exception $e) {
            return redirect()->route('reservas.eliminar')->with('error', 'Error al eliminar la reserva');
        }
    }
    //eliminar reserva 


    public function reservaMaterial()
    {
        $productosDisponibles = product::all();
        $horas['horasInicio'] = ["08:00","08:55","09:50","11:15","12:10","13:05"];
            $horas['horasFin'] = ["08:55","09:50","11:15","12:10","13:05","14:00"];

        return view ('reservas.reservarDispositivo', ['productosDisponibles' => $productosDisponibles, 'horas' => $horas]);
    }

    public function materialDisponible($fecha, $hora)
    {
        $products = product::all();

        return view('secciones.dispositivos', ['productosDisponibles' => $products]);
    }

 
    
    public function mostrarFormularioEliminarAula()
    {
        $reservas = Event::all();
        return view('reservas.eliminar', ['reservas' => $reservas]);
    }


    public function mostrarReservas(Request $request)
    {
        $reservas = Event::where('id_profesor', function($query) {
            $query->select('id')
                ->from('teachers')
                ->where('email', 'oscarluciomorenojorge@alumno.ieselrincon.es');
        })->whereNotNull('id_aula')->get();


        return view ('reservas.eliminar', ['reservas' => $reservas]);
    }

    //Editar reserva


    public function mostrarFormularioEditarReserva()
    {
        $reservas = Event::all(); // Obtener todas las reservas
        return view('reservas.editar', ['reservas' => $reservas]);
    }


    public function editarReserva(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'reserva' => 'required|exists:events,id',
            'diaReserva' => 'required|date',
            'horaInicioReserva' => 'required|date_format:H:i',
            'horaFinalReserva' => 'required|date_format:H:i|after:horaInicioReserva'

        ]);

        try {
            // Obtener el ID de la reserva a editar desde la solicitud
            $idReserva = $request->input('reserva');

            // Buscar la reserva en la base de datos
            $reserva = Event::findOrFail($idReserva);

            // Actualizar los campos de la reserva con los datos del formulario
            $reserva->dia = $request->input('diaReserva');
            $reserva->hora_inicio = $request->input('horaInicioReserva');
            $reserva->hora_fin = $request->input('horaFinalReserva');


            // Guardar los cambios en la base de datos
            $reserva->save();

            // Redireccionar con un mensaje de éxito
            return redirect()->route('reservas.editar')->with('success', 'Reserva editada correctamente');
        } catch (\Exception $e) {
            // Manejar cualquier error que pueda ocurrir durante la edición
            return redirect()->route('reservas.editar')->with('error', 'Error al editar la reserva');
        }

        
    }







    public function reservaPrueba()
    {
        return view('secciones.reservaPrueba');
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
        $bookings = Event::all();
        foreach ($bookings as $evento) {
            // Concatenamos las fechas y horas para formar un formato de fecha y hora adecuado.
            $startDateTime = $evento->dia . 'T' . $evento->hora_inicio;
            $endDateTime = $evento->dia . 'T' . $evento->hora_fin;
    
            // Determinar el color de fondo según el día del evento (por ejemplo, si es hoy)
            $backgroundColor = ($evento->dia == date('Y-m-d')) ? '#070D29' : '#070D29';
    
            $events[] = [
                'title' => 'Reserva',
                'id_profesor' => $evento->id_profesor,
                'id_aula' => $evento->id_aula,
                'start' => $startDateTime,
                'end' => $endDateTime,
                'backgroundColor' => $backgroundColor, 
            ];
        }
    
        // Devolvemos la vista con los eventos.
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

    public function eleccionreserva(){

        return view ('login.eleccion');
    }

    public function eleccioneditar()
    {

        return view('reservas.eliminar');
    }


    //eleccion eliminar


    public function eleccioneliminar()
    {

        return view('reservas.eleccioneliminar');
    }
}
