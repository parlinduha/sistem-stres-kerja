<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WeatherController extends Controller
{
    public function index()
    {
        $path = base_path('python/weather_data.json');

        if (!File::exists($path)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        $json = File::get($path);
        $data = json_decode($json, true);
        return response()->json($data);
    }
}
