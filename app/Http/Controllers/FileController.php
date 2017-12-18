<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()){

            $dataset_id = null;

            if($request->input('dataset')){
                $dataset_id = $request->input('dataset');
            }

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
            else if ($clientExtension == 'jpg' || $clientExtension == 'jpeg' || $clientExtension == 'png' || $clientExtension == 'gif'){
                $type = 'image';
            }
            else {
                return 'Unacceptable file';
            }
            
            $name = substr($fileUploaded->hashName(), 0, - strlen($fileUploaded->extension())) . $clientExtension;

            $path = $fileUploaded->storeAs($type, $name);

            $file = new File();

            $file->user_id       = Auth::user()->id;
            $file->dataset_id    = $dataset_id;
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

    public function image(File $file)
    {
        $path = storage_path($file->path);

        $contents = Storage::get($file->path);
        $type = Storage::mimeType($file->path);

        $response = response()->make($contents, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    public function download(File $file)
    {
        $path = storage_path('app/' . $file->path);

        return response()->download($path, $file->client_name);
    }

    public function destroy(File $file)
    {
        $file->delete();

        return 'ok';
    }
}
