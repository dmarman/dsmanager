<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dataset;
use App\Container;
use App\File;
use App\Test;

class DatasetController extends Controller
{
    public function index()
    {
        $datasets = Dataset::with('files', 'tests', 'tests.checks', 'channels', 'channels.filters', 'channels.delay')->get();

        return $datasets;
    }

    public function dataset(Dataset $dataset)
    {
        $dataset->load('container', 'container', 'container.car', 'container.body',
            'container.radio', 'container.soundsystem', 'container.hand', 'container.amplifier',
            'files', 'files.user', 'tests', 'tests.checks', 'tests.checks.user', 'channels', 'channels.filters', 'channels.delay');

        return $dataset;
    }

    public function show(Dataset $dataset)
    {
        $dataset->load('files', 'files.user', 'tests', 'tests.checks', 'tests.checks.user', 'channels', 'channels.filters', 'channels.delay');

        return view('container.dataset.show', compact(['dataset']));
    }

    public function create(Request $request)
    {
        $type = $request->input('type');

        $container = Container::with('car', 'body', 'radio', 'soundsystem',
            'hand', 'amplifier', 'datasets.files', 'datasets.tests', 'datasets.tests.checks',
            'datasets.channels', 'datasets.channels.filters', 'datasets.channels.delay')->find($request->input('container'));

        $lastDataset = Dataset::lastVersionOf($container->id, $type);

        if(isset($lastDataset->version)){
            $version = $lastDataset->version + 1;
        }
        else {
            $version = 0;
        }

        return view('container.dataset.create', compact(['container', 'type', 'version']));
    }

    public function store(Request $request)
    {
        $dataset = new Dataset();
        $dataset->container_id = $request->input('container');
        $dataset->version = $request->input('version');
        $dataset->week_release = $request->input('week');
        $dataset->year_release = $request->input('year');
        $dataset->type = $request->input('type');
        $dataset->save();

        $audioTest = new Test();
        $audioTest->dataset_id = $dataset->id;
        $audioTest->type = 'sound';
        $audioTest->save();

        $benchTest = new Test();
        $benchTest->dataset_id = $dataset->id;
        $benchTest->type = 'bench';
        $benchTest->save();

        $comments = new Test();
        $comments->dataset_id = $dataset->id;
        $comments->type = 'comments';
        $comments->save();

        if($request->input('dsm')){
            $file = File::findOrFail($request->input('dsm'));
            $file->dataset_id = $dataset->id;
            $file->save();
        }
        if($request->input('prg')){
            $file = File::findOrFail($request->input('prg'));
            $file->dataset_id = $dataset->id;
            $file->save();
        }
        if($request->input('vas')){
            $file = File::findOrFail($request->input('vas'));
            $file->dataset_id = $dataset->id;
            $file->save();
        }
        if($request->input('dspproj')){
            $file = File::findOrFail($request->input('dspproj'));
            $file->dataset_id = $dataset->id;
            $file->save();
        }

        return redirect()->action(
            'DatasetController@show', ['dataset' => $dataset]
        );

    }


}





















