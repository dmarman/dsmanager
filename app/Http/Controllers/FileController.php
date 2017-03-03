<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {

            $file = $request->file('file');

            if ($file->guessExtension() == 'xml') {

                $fileName = $file->hashName();

                if (env('LOCAL_STORAGE') == true ) {
                    $path = $file->storeAs('files', $fileName);
                };

                return response()->json(['success' => true, //TODO clean returns
                    'status'  => 'uploaded',
                    'fileId' => 101,
                    'file'   => 'xml'
                ]);
            }

            if ($file->guessExtension() == 'ttf') {

                $fileName = $file->hashName();

                if (env('LOCAL_STORAGE') == true ) {
                    $path = $file->storeAs('files', $fileName);
                };

                return response()->json(['success' => true,
                    'status'  => 'uploaded',
                    'fileId' => 102,
                    'file'   => 'ttf'
                ]);
            }

            return response()->json(['success'      => false,
                                     'errorMessage' => 'Error: wrong file extension'
                                    ]);
        }

        return response()->json(['success'      => false,
                                 'errorMessage' => 'Error: no file sent to the server'
                                ]);

    }
}
