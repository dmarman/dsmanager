<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Container;

class SearchController extends Controller
{
    function index(Request $request) 
    {
        $containers = Container::search($request->input('q'))->get();
        
        return view('container.index', compact('containers'));
    }
}
