<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Check;

class CheckController extends Controller
{
    public function store(Request $request)
    {
        $check = new Check();
        $check->test_id = $request->input('test');
        $check->user_id = Auth::user()->id;
        $check->comment = $request->input('comment');
        $check->result = 'OK';
        $check->save();

        $check->load('user', 'test');

        return $check;
    }
}
