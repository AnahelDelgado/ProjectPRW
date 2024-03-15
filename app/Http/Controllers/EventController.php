<?php

namespace App\Http\Controllers;

use App\Models\classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\event;
use App\Models\eventproduct;
use App\Models\product;
use App\Models\teacher;
use PhpParser\Node\Stmt\TryCatch;

class EventController extends Controller
{

    //Calendario
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

    // Añadir reserva
    public function añadir()
    {
        return view('reservas.añadir');
    }

    public function horasDisponibles($fecha)
    {
        $horas['horasInicio'] = ["08:00", "08:55", "09:50", "11:15", "12:10", "13:05"];
        $horas['horasFin'] = ["08:55", "09:50", "11:15", "12:10", "13:05", "14:00"];

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


        $horas['horasInicio'] = ["08:00", "08:55", "09:50", "11:15", "12:10", "13:05"];
        $horas['horasFin'] = ["08:55", "09:50", "11:15", "12:10", "13:05", "14:00"];

        $hayReservas = event::where('dia', $fecha)
            ->where('id_aula', $idaula)
            ->count();

        $reservas = event::where('dia', $fecha)
            ->where('id_aula', $idaula)
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

        return view('reservas.añadir', ['horas' => $horas, 'fecha' => $fecha, 'aulas' => $aulas, 'aulaSeleccionada' => $aula]);
    }

    // Almacenar los datos en la ddbb
    public function store(Request $request)
    {

        $request->input('diaReserva', 'horaInicioReserva', 'horaFinalReserva', 'aula');

        if (empty($request->input('diaReserva'))) {
            echo 'No se ha seleccionado una fecha';
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

    // Eliminar reserva 
    public function eliminarReserva(Request $request)
    {
        $request->validate([
            'reserva' => 'required|exists:events,id'
        ]);

    
        try {
            $idReserva = $request->input('reserva');
            $reserva = event::findOrFail($idReserva);

            $reservasDispositivos = eventProduct::where('id_reserva', $request->input('reserva'))->count();

            if($reservasDispositivos > 0) {
                eventProduct::where('id_reserva', $idReserva)->delete();
                $reserva->delete();
            }
            else {
                $reserva->delete();
            }

            return redirect()->route('reservas.eliminar')->with('success', 'Reserva eliminada correctamente');
        } catch (\Exception $e) {
            return redirect()->route('reservas.eliminar')->with('error', 'Error al eliminar la reserva');
        }
    }


    public function reservaMaterial()
    {
        $productosDisponibles = product::all();
        $horas['horasInicio'] = ["08:00", "08:55", "09:50", "11:15", "12:10", "13:05"];
        $horas['horasFin'] = ["08:55", "09:50", "11:15", "12:10", "13:05", "14:00"];

        return view('reservas.reservarDispositivo', ['productosDisponibles' => $productosDisponibles, 'horas' => $horas]);
    }

    public function storeMaterial(Request $request) {
        $request->input('fecha', 'horaInicio', 'horaFinal', 'productos');
        
        $nuevaReserva = new event();
        $nuevaReserva->dia = $request->input('fecha');
        $nuevaReserva->hora_inicio = $request->input('horaInicio');
        $nuevaReserva->hora_fin = $request->input('horaFinal');
        $nuevaReserva->id_profesor = teacher::where('email', session()->get('user'))->first()->id;
        $nuevaReserva->save();

        $productosInput = explode(",",$request->input('productos', []));


        foreach ($productosInput as $producto) {
            $id = explode(':"', $producto);
            $id = explode('"', $id[1])[0];
            
            $nuevaReservaDispositivo = new eventproduct();
            $nuevaReservaDispositivo->id_reserva = $nuevaReserva->id;
            $nuevaReservaDispositivo->id_product = $id;
            $nuevaReservaDispositivo->save();
        }

        return redirect()->route('secciones.index');
    }

    public function materialDisponible($fecha, $horaInicio, $horaFinal)
    {
        $products = product::whereNotIn('id', function ($query) use ($fecha, $horaInicio, $horaFinal) {
            $query->select('id_product')
                ->from('eventproducts')
                ->whereIn('id_reserva', function ($subQuery) use ($fecha, $horaInicio, $horaFinal) {
                    $subQuery->select('id')
                        ->from('events')
                        ->where('dia', $fecha)
                        ->where('hora_inicio', $horaInicio)
                        ->where('hora_fin', $horaFinal);
                });
        })->get();

        return view('secciones.dispositivos', [
        'productosDisponibles' => $products, 
        'fecha' => $fecha, 
        'horaInicio' => $horaInicio, 
        'horaFinal' => $horaFinal
        ]);
    }

    public function mostrarReservasEliminar(Request $request)
    {
        $reservas = event::where('id_profesor', function ($query) {
            $query->select('id')
                ->from('teachers')
                ->where('email', session()->get('user'))
                ->first()->id;
        })->get();

        return view('reservas.eliminar', ['reservas' => $reservas]);
    }



    // Editar reserva
    public function mostrarReservasEditar()
    {

        $horas['horasInicio'] = ["08:00", "08:55", "09:50", "11:15", "12:10", "13:05"];
        $horas['horasFin'] = ["08:55", "09:50", "11:15", "12:10", "13:05", "14:00"];

        $reservas = event::where('id_profesor', function ($query) {
            $query->select('id')
                ->from('teachers')
                ->where('email', session()->get('user'))
                ->first()->id;
        })->get();

        return view('reservas.editar', ['reservas' => $reservas, 'horas' => $horas]);
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

    public function agregar()
    {

        return view('secciones.agregarMaterial');
    }


   
    



    // Editar
    public function editar()
    {
        return view('reservas.editar');
    }


    public function editarMaterial()
    {

        return view('secciones.editarMaterial');
    }

    // Eliminar
    public function eliminar()
    {

        return view('reservas.eliminar');
    }

    public function eliminarMaterial()
    {

        return view('secciones.eliminarMaterial');
    }




    // Eleccion editar
    public function eleccionreserva()
    {

        return view('login.eleccion');
    }

    public function eleccioneditar()
    {

        return view('reservas.eliminar');
    }


    //eleccion eliminar


    public function mostrarFormularioEliminarAula()
    {
        $reservas = Event::all();
        return view('reservas.eliminar', ['reservas' => $reservas]);
    }
}
