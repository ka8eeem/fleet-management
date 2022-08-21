<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    use HasFactory;

    public function startStation() {
        return $this->hasOne(Stations::class, 'id', 'start_station');
    }
    public function endStation() {
        return $this->hasOne(Stations::class, 'id', 'end_station');
    }
}
