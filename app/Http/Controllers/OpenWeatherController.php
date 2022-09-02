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

        foreach($data as $obj)
        {
            $lat = $obj->lat;
            $lon = $obj->lon;
        }

        // By coordinates : latitude and longitude
        $info = $wt->getCurrentByCord($lat, $lon);

        return response()->json($info);
    }


}
