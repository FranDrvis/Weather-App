<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherForecast extends Model
{
    protected $fillable = [
        'city_name',
        'temperature',
        'humidity',
        'description',
        // other attributes...
    ];
}
