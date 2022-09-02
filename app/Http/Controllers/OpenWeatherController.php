<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RakibDevs\Weather\Weather;
use App\Location;

class OpenWeatherController extends Controller
{    
    
    public function index(){

    }

    public function findWeather(Request $request)
    {
        $data = Location::where("id", $request->city)->get(["lon", "lat"]);

        $wt = new Weather();

        // By coordinates : latitude and longitude
        $info = $wt->getCurrentByCord(23.7104, 90.4074);

        return response()->json($data);
    }


}
