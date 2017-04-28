<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Container;

class ContainerController extends Controller
{
    public function index()
    {
        $container = Container::with('car', 'body', 'radio', 'soundsystem',
                                'hand', 'amplifier', 'datasets.files', 'datasets.tests', 'datasets.tests.checks',
                                'datasets.channels', 'datasets.channels.filters', 'datasets.channels.delay')->get();

        return $container;
    }

    public function container(Container $container)
    {
        return $container;
    }

    public function create()
    {

        return view('container.create');
    }
}
