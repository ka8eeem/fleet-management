<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripsRouteLines extends Model
{
    use HasFactory;

    public function trip() {
        return $this->hasOne(Trips::class, 'id', 'trip_id');
    }

    public function bus() {
        return $this->hasOne(Buses::class, 'id', 'bus_id');
    }

    public function fromStation() {
        return $this->hasOne(Stations::class, 'id', 'from_station_id');
    }

    public function toStation() {
        return $this->hasOne(Stations::class, 'id', 'to_station_id');
    }

    public function routeLinePrice() {
        return $this->hasOne(TripRoutesPrices::class, 'trip_route_id', 'id');
    }

}
