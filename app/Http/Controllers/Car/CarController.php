<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return view('car.index', compact('cars'));
    }

    public function show(Container $container)
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }
}
