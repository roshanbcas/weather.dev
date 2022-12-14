<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\OpenWeatherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('weather');
// });

Route::get('/', [WeatherController::class, 'index']);
Route::post('/fetch-cities', [WeatherController::class, 'fetchCity']);
Route::post('/find-weather', [OpenWeatherController::class, 'findWeather']);