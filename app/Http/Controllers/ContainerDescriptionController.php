<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContainerDescription;

class ContainerDescriptionController extends Controller
{
    public function descriptions()
    {
        return ContainerDescription::with('car', 'body', 'radio', 'soundsystem', 'hand', 'amplifier')->get();
    }
}
