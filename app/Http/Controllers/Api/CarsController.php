<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Car;

class CarsController extends Controller
{
    public function index() {
        $cars = Car::all();

        return response()->json([
            'success'=> true,
            'results'=> $cars
        ]);
    }


}
