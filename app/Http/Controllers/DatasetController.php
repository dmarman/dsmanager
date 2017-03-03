<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Body;
use App\Car;
use App\Hand;
use App\Radio;
use App\Soundsystem;

class DatasetController extends Controller
{
    public function formData ()
    {
        $car = Car::all();
        $radio = Radio::all();
        $soundsystem = Soundsystem::all();
        $body = Body::all();
        $hand = Hand::all();
        $collection = collect(['data' =>['car' => $car,
                                         'radio' => $radio,
                                         'soundsystem' => $soundsystem,
                                         'body' => $body,
                                         'hand' => $hand]
                                ]);

        return $collection;
    }
}
