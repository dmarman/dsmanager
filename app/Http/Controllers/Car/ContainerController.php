<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Container;
use App\Amplifier;
use App\Body;
use App\Car;
use App\Radio;
use App\Soundsystem;
use App\Hand;
use App\Image;

class ContainerController extends Controller
{
    public function index(Car $car)
    {
        $containers = $car->container;

        return view('container.index', compact('containers'));
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
