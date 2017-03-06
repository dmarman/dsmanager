<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Container;

class ContainerController extends Controller
{
    public function containers()
    {
        return Container::with('description.car', 'description.body', 'description.radio', 'description.soundsystem', 'description.hand', 'description.amplifier')->get();
    }
}
