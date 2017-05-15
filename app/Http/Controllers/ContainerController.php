<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        $containers = Container::with('car', 'body', 'radio', 'soundsystem',
                                'hand', 'amplifier', 'datasets.files', 'datasets.tests', 'datasets.tests.checks',
                                'datasets.channels', 'datasets.channels.filters', 'datasets.channels.delay')->get();

        return view('container.index', compact('containers'));
    }

    public function show(Container $container)
    {
        $container->load('car', 'body', 'radio', 'soundsystem',
            'hand', 'amplifier', 'datasets.files', 'datasets.tests', 'datasets.tests.checks',
            'datasets.channels', 'datasets.channels.filters', 'datasets.channels.delay');

        $image = Image::where('car_id', $container->car->id)->where('body_id', $container->body->id)->first();

        return view('container.show', compact('container', 'image'));
    }

    public function create()
    {
        $amplifiers = Amplifier::all();
        $bodies = Body::all();
        $cars = Car::all();
        $radios = Radio::all();
        $soundsystems = Soundsystem::all();
        $hands = Hand::all();

        return view('container.create', compact(['amplifiers', 'bodies', 'cars', 'radios', 'soundsystems', 'hands']));
    }

    public function store(Request $request)
    {
        $container = new Container();
        $container->car_id = $request->input('car');
        $container->body_id = $request->input('body');
        $container->radio_id = $request->input('radio');
        $container->soundsystem_id = $request->input('soundsystem');
        $container->hand_id = $request->input('hand');
        $container->week = $request->input('week');
        $container->year = $request->input('year');
        $container->amplifier_id = $request->input('amplifier');
        $container->save();

        return redirect()->action(
            'ContainerController@show', ['container' => $container]
        );
    }
}
