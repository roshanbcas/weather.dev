<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    // use HasFactory;
    
    protected $fillable = [
        'city', 'lon', 'lat', 'country'
    ];
}
