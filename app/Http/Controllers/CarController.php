<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarController extends Controller
{
    use SoftDeletes;
}
