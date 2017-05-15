<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()){
            $fileUploaded = $request->file('file');

            $clientExtension = $fileUploaded->getClientOriginalExtension();
            $clientName = $fileUploaded->getClientOriginalName();

            $prefix = strtolower(substr($clientName, 0, 3));

            if ($clientExtension == 'xml' && $prefix == 'dsm'){
                $type = 'dsm';
            }
            else if ($clientExtension == 'xml' && $prefix == 'vas'){
                $type = 'vas';
            }
            else if ($clientExtension == 'xml' && $prefix == 'prg'){
                $type = 'prg';
            }
            else if ($clientExtension == 'dspproj'){
                $type = 'dspproj';
            }
            else {
                return 'Unacceptable file';
            }

            $name = substr($fileUploaded->hashName(), 0, -3) . $clientExtension;

            $path = $fileUploaded->storeAs($type, $name);

            $file = new File();

            $file->user_id       = Auth::user()->id;
            $file->dataset_id    = null;
            $file->client_name   = $fileUploaded->getClientOriginalName();
            $file->name          = $name;
            $file->type          = $type;
            $file->size          = $fileUploaded->getSize();
            $file->path          = $path;
            $file->local_storage = 1;
            $file->cloud_storage = 0;

            $file->save();

            return response()->json([
                'status' => 'ok',
                'file' => $file
            ]);
        }

        return response()->json([
            'status' => 'fail',
            'error' => $request->file('file')->getError()
        ]);
    }

    public function download(File $file)
    {
        $path = storage_path('app/' . $file->path);

        return response()->download($path, $file->client_name);
    }
}
