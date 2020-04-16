<?php

namespace App\Http\Controllers\Projects;
use App\Http\Controllers\Controller;
use App\Models\Projects\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller{
    public function download(Request $request, $id){
        try {
            $file = File::where('id', $id)->first();
            return Storage::download($file->path);
            /* $url = storage_path("app/public/".$file->path);
            return response()->download($url,$file->name); */
        } catch (\Throwable $error) {
            echo("El error es : ".$error);
        }
    }
    
    public function showPdf(Request $request, $id){
        try {
            $file = File::where('id', $id)->first();
            return Storage::response($file->path);
        } catch (\Throwable $error) {
            echo("El error es : ".$error);
        }
    }
}
