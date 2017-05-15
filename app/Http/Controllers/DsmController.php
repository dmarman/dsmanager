<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Helpers\DsmParser;
use App\File;

class DsmController extends Controller
{
    public function show(File $file)
    {
        $contents = Storage::get($file->path);


        $path = storage_path('app/' . $file->path);

        $array = json_decode(json_encode(simplexml_load_string($contents)), true);

        //dd($array);
        //return $array;
        //return response()->file($path);

        $dsm = new DsmParser($contents);

        $dataset = $dsm->dataset;
//        return $dsm->signalFlow;
//        return $dsm->dataset();
//        return $dsm->dataset;
        return view('container.dsm.show', compact(['dataset']));

    }

}
