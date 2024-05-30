<?php

namespace App\Http\Controllers\reservation;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    //vista incial del calendario
    public function index()
    {
        return view('reservation.calendar.index');
    }

    //para crear la reservacion
    public function create(Request $request)
    {
        //validando los campos
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'customer_name' => 'required|string',
            'number_phone' => 'required|numeric',
            'number_of_seats' => 'required|integer',
            'start' => 'required|date',
            'end' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code'  => 2,
                'error' => $validator->errors()->toArray()
            ]);
        } else {

            //validando las fechas
            if ($request->start == $request->end) {
                $allDay = "true";
            } else {
                $allDay = ""; //o puede ser vacio
            }
            //guardando los campos
            $save = Reservation::create([
                'title' => $request->title,
                'customer_name' => $request->customer_name,
                'number_phone' => $request->number_phone,
                'url' => '',
                'number_of_seats' => $request->number_of_seats,
                'start' => $request->start,
                'end' => $request->end,
                'allDay' => $allDay,
                'state' => 'ACTIVO',
                'table_id' => 1,
                'user_id' => auth()->user()->id,
            ]);

            if ($save) {
                return response()->json([
                    'code' => 1,
                    'msg' => 'RESERVACIÓN CREADA EXITOSAMENTE'
                ]);
            } else {
                return response()->json([
                    'code' => 0,
                    'msg' => 'RESERVACIÓN NO FUE CREADA - COMUNICAR AL AREA DE SISTEMAS'
                ]);
            }
        }
    }

    //metodo para traer la lista de resevaciones registradas en la base de datos y pinstarlo en el events 
    public function list()
    {
        //Obtener los datos de las reservaciones
        $reservations = Reservation::all();

        //formatear los datos para que pueda ser leido por full calendar
        $events = $reservations->map(function ($reservation) {
            return [
                'id' => $reservation->id,
                'title' => $reservation->title,
                'start' => $reservation->start,
                'end' => $reservation->end,
                'allDay' => $reservation->allDay,
                'customer_name' => $reservation->customer_name,
                'number_phone' => $reservation->number_phone,
                'number_of_seats' => $reservation->number_of_seats,
                'table_id' => $reservation->table_id,
                'user_id' => $reservation->user_id,
            ];
        });

        //retornar los valores ya formateados en formato JSON
        return response()->json($events);
    }

    //metodo para poder actualizar la reservacion
    public function update(Request $request)
    {
        //validando los campos
        $validator = Validator::make($request->all(), [
            'title_up' => 'required|string',
            'customer_name_up' => 'required|string',
            'number_phone_up' => 'required|numeric',
            'number_of_seats_up' => 'required|integer',
            'start_up' => 'required|date',
            'end_up' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code'  => 2,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            //validando las fechas
            if ($request->start_up == $request->end_up) {
                $allDay = "true";
            } else {
                $allDay = ""; //o puede ser vacio
            }

            $reservation = Reservation::find($request->id_reservation);

            $save = $reservation->update([
                'title' => $request->title_up,
                'customer_name' => $request->customer_name_up,
                'number_phone' => $request->number_phone_up,
                'url' => '',
                'number_of_seats' => $request->number_of_seats_up,
                'start' => $request->start_up,
                'end' => $request->end_up,
                'allDay' => $allDay,
                'state' => 'ACTIVO',
                'table_id' => 1,
                'user_id' => auth()->user()->id,
            ]);

            if ($save) {
                return response()->json([
                    'code' => 1,
                    'msg' => 'RESERVACIÓN ACTUALIZADA EXITOSAMENTE'
                ]);
            } else {
                return response()->json([
                    'code' => 0,
                    'msg' => 'RESERVACIÓN NO FUE ACTUALIZA - COMUNICAR AL AREA DE SISTEMAS'
                ]);
            }
        }
    }

    //ELIMINAR UNA RESERVACION 
    public function delete(Request $request)
    {
        $reservation = Reservation::find($request->id_reservation_delete);

        if ($reservation) {
            $delete =  $reservation->delete();

            if ($delete) {
                return response()->json([
                    'code' => 1,
                    'msg' => 'RESERVACIÓN ELIMINADA EXITOSAMENTE'
                ]);
            } else {
                return response()->json([
                    'code' => 0,
                    'msg' => 'RESERVACIÓN NO FUE ELIMINADA - COMUNICAR AL AREA DE SISTEMAS'
                ]);
            }
        }
    }
}
