<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Container;

class ContainerController extends Controller
{
    public function all()
    {
        $container = Container::with('description.car', 'description.body', 'description.radio', 'description.soundsystem',
                                'description.hand', 'description.amplifier', 'datasets.files', 'datasets.tests', 'datasets.tests.checks',
                                'datasets.channels', 'datasets.channels.filters', 'datasets.channels.delay')->get();

        return $container;
    }

    public function container(Container $container)
    {
        return $container;
    }
}
