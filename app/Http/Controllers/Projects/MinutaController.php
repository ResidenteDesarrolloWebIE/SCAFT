<?php


namespace App\Http\Controllers\Projects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects\Minuta;
use App\Models\Projects\Project;

class MinutaController extends Controller
{
    public function index(Request $request, $id){
        $project = Project::with('minutes')->find($id);
        return view('admin.projects.viewMinutes')->with('minutes',$project->minutes);
    }

    public function storeMinuta(Request $request){
        dd('hola');
    }
}
