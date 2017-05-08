<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dataset;
use App\Container;

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
            'container.radio', 'container.soundsystem', 'hand', 'amplifier',
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
}
