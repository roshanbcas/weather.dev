<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class WeatherController extends Controller
{
    public function index()
    {
        $data['countries'] = Location::all()->unique('country')->sortBy('country');
        return view('weather', $data);
    }

    // Get cities
    public function fetchCity(Request $request)
    {
        $data['cities'] = Location::where("id", $request->id)
                                    ->get(["city", "id"]);
                                      
        return response()->json($data);
    }
}
