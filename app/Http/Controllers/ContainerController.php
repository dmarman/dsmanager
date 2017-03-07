<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Container;

class ContainerController extends Controller
{
    public function containers()
    {
        $container = Container::with('description.car', 'description.body', 'description.radio', 'description.soundsystem',
                                'description.hand', 'description.amplifier', 'datasets.files', 'datasets.tests', 'datasets.tests.checks',
                                'datasets.channels', 'datasets.channels.filters')->get();

        return $container;
    }
}
