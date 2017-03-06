<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContainerDescription;

class ContainerDescriptionController extends Controller
{
    public function containerDescriptions()
    {
        return ContainerDescription::with('car', 'body', 'radio', 'soundsystem', 'hand', 'amplifier')->get();
    }
}
