<?php

namespace App\Http\Controllers\Projects;
use App\Http\Controllers\Controller;
use App\Models\Projects\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PurchaseOrderController extends Controller
{
    public function download(Request $request,$id){
        try {
            $project = Project::with('purchaseOrder')->where('id',$id)->first();
        return Storage::download($project->purchaseOrder->file->path);
        } catch (\Throwable $error) {
            echo("El error es : ".$error);
        }
        
    }
}
