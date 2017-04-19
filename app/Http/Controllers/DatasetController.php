<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dataset;

class DatasetController extends Controller
{
    public function index()
    {
        $datasets = Dataset::with('files', 'tests', 'tests.checks', 'channels', 'channels.filters', 'channels.delay')->get();

        return $datasets;
    }

    public function dataset(Dataset $dataset)
    {
        $dataset->load('files', 'files.user', 'tests', 'tests.checks', 'tests.checks.user', 'channels', 'channels.filters', 'channels.delay');

        return $dataset;
    }

    public function showDataset (Dataset $dataset)
    {
        $dataset->load('files', 'tests', 'tests.checks', 'tests.checks.user', 'channels', 'channels.filters', 'channels.delay');

        return view('dataset', compact(['dataset']));
    }
}
