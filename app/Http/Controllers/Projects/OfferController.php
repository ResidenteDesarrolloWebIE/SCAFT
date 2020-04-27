<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Projects\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    public function download(Request $request, $id){
        try {
            $project = Project::with('offer')->where('id', $id)->first();
            return Storage::download($project->offer->file->path);
            
            /* $url = storage_path("app/public/".$project->offer->file->path);
            return response()->download($url,$project->offer->file->name); */

        } catch (\Throwable $error) {
            echo("El error es : ".$error);
        }
    }

    public function showPdf(Request $request, $id){
        try {
            $project = Project::with('offer')->where('id', $id)->first();
            return Storage::response($project->offer->file->path);
        } catch (\Throwable $error) {
            echo("El error es : ".$error);
        }
    }
}
