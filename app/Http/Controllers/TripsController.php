<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use App\Models\TripsRouteLines;
use Illuminate\Http\Request;
use App\Models\Trips;
use Illuminate\Support\Str;

class TripsController extends Controller
{


    public function searchTrips(Request $request) {

        $request->validate([
            'date' => 'required|date|date_format:Y-m-d',
            'from' => 'required',
            'to' => 'required',
        ]);

        $availableTrips = TripsRouteLines::where(function($q) use ($request) {
            $q->where('from_station_id', $request->from)
                ->where('to_station_id', $request->to)
                ->where('trip_date', $request->date);
        })
            ->with('routeLinePrice')
            ->with('trip')
            ->with('fromStation')
            ->with('toStation')
            ->with('bus')
            ->get();


        return response([
            'data' => $this->getTripAvailableSeats($availableTrips),
        ], 200);

    }

    public function bookTicket(Request $request) {
        $request->validate([
            'customer_number' => 'required|integer|max:255',
            'seat_number' => 'required|integer|max:100',
            'price' => 'required|integer',
            'trip_id' => 'required|integer',
            'route_line_id' => 'required|integer'
        ]);

        //check if reserved seat is free
        $ticketCheck = Tickets::where(function($q) use ($request) {
            $q->where('route_line_id', $request->route_line_id)
                ->where('trip_id', $request->trip_id)
                ->where('seat_number', $request->seat_number);
        })
            ->first();
        if($ticketCheck) {
            return response(['message' => "seat already reserved!", 'status' => 'error'], 401);
        }

        $ticket = new Tickets();
        $ticket->code = Str::random('10');
        $ticket->seat_number = $request->seat_number;
        $ticket->price = $request->price;
        $ticket->trip_id = $request->trip_id;
        $ticket->route_line_id = $request->route_line_id;
        $ticket->customer_number = $request->customer_number;

        if($ticket->save()) {
            return response([
                'message' => 'ticket created successfully!',
                'status' => 'success',
                'data' => [
                    'ticket' => $ticket
                ]
            ], 201);
        } else return response(['message' => "couldn't create the ticket, please contact system admin", 'status' => 'error'], 401);

    }

    protected function getTripAvailableSeats($routeLineObj) {

        foreach ($routeLineObj as $key => $routeLine) {
            $availableSeats = [];
            $reservedTickets = Tickets::where('route_line_id', $routeLine->id)->where('trip_id', $routeLine->trip_id)->get('seat_number')->pluck('seat_number')->toArray();

            foreach($routeLine->bus->seat_map[0] as $seatBlock){
                foreach($seatBlock as $seat){
                    if(!in_array($seat->numbering, $reservedTickets)) $availableSeats[] = $seat;
                }
            }

            $routeLineObj[$key]['available_seats'] = $availableSeats;

        }
        return $routeLineObj;
    }

    protected function checkSeatAvailability($request) {
        $available = true;

        $ticketCheck = Tickets::where(function($q) use ($request) {
            $q->where('route_line_id', $request->route_line_id)
                ->where('trip_id', $request->trip_id)
                ->where('seat_number', $request->seat_number);
        })
            ->first();

        if($ticketCheck) $available = false;
        else {
            $routeLines = TripsRouteLines::where('trip_id', $request->trip_id)
                ->with('trip')
                ->get();
        }

        return $available;
    }

}
