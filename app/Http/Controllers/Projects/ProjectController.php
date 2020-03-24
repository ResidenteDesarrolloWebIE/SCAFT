<?php

namespace App\Http\Controllers\Projects;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use App\Models\Projects\AffiliationProject;
use App\Models\Projects\EconomicAdvance;
use App\Models\Projects\Project;
use App\Models\Projects\TechnicalAdvance;
use Illuminate\Http\Request;
use App\User;

class ProjectController extends Controller
{
    public function showProjects(){
        $clients = User::whereHas('roles', function (Builder $query) {
            $query->where('name', '=', 'client');
        })->get();
        $clients = User::all();
        $projects = Project::with(['customer','technicalAdvances','economicAdvances','affiliations','files','images'])->get(); 
        return view('admin.projects.projects')->with('projects', $projects)->with('clients', $clients);
    }
    public function create(Request $request){
        $existQuotation = Project::where('folio', $request->folioProject)->first();
        if (!is_null($existQuotation)) {
            return abort(response()->json(["message" => 'El folio ingresado esta duplicado'], 400));
        } else {
            try {
                $project = new Project();
                $project->folio = trim($request->folioProject);
                $project->name = trim($request->nameProject);
                $project->status = 'PENDIENTE';
                $project->type = $request->typeProject;
                $project->substation = trim($request->substationProject);
                $project->description = trim($request->descriptionProject);
                $project->customer_id = $request->clientProject;
                $project->save();

                $economicAdvance = new EconomicAdvance();
                $economicAdvance->advance= 0;
                $economicAdvance->engineering_release_payment= 0;
                $economicAdvance->final_payment= 0;
                $economicAdvance->total= 0;
                $economicAdvance->project_id= $project->id;
                $economicAdvance->save();

                $technicalAdvance = new TechnicalAdvance();
                $technicalAdvance->receive_order = 0;
                $technicalAdvance->engineering_release = 0;
                $technicalAdvance->work_progress = 0;
                $technicalAdvance->delivery_customer = 0;
                $technicalAdvance->project_id = $project->id;
                $technicalAdvance->save();

                if(!is_null($request->affiliationProject)){
                    $affiliation = new AffiliationProject();
                    $affiliation->project_id = $project->id;
                    $affiliation->affiliation_project_id = $request->affiliationProject;
                }
                /* Editar avance tecnico,
                   Editar avance economico,
                   Editar projectos (Poner afiliaciones),
                   Añadir imagenes,
                   Añadir oferta,
                   Redactar minutas,*/
                return response()->json(['error' => false,'message' => 'La cotizacion fue creada correctamente','code' => 200], 200);
            } catch (\Throwable $th) {
                echo("El error ocurrido es el siguiente: ".$th);
                return abort(response()->json(["message" => 'La cotizacion no pudo ser creada'], 400));
            }
        }
    }
    public function edit(Request $request){
        try {
            $project = Project::where('id', $request->project)->first();
            $project->folio = trim($request->folioProject);
            $project->name = trim($request->nameProject);
            if(!is_null($request->statusProject)){
                $project->status = $request->statusProject;
            }
            $project->type = $request->typeProject;
            $project->substation = trim($request->substationProject);
            $project->description = trim($request->descriptionProject);
            $project->save();
            /* $quotation->user_id = $request->clientProject; */ 
            return response()->json(["message" => 'La cotizacion fue creada correctamente'], 200);
        } catch (\Throwable $th) {
            echo("El error ocurrido es el siguiente: ".$th);
            return abort(response()->json(["message" => 'La cotizacion no pudo ser creada'], 400));
        }
    }



    /* Retornas vista para los clientes */
    public function showServices(){
        /* $projects = Project::with('customer','technicalAdvances','economicAdvances','affiliations','files','images')->where('type','SERVICIO')->get();
        return view('admin.projectsList')->with('projects', $projects); */
        return view('client.projects.services');
    }
    public function showSupplies(){
        /* $projects = Project::with('customer','technicalAdvances','economicAdvances','affiliations','files','images')->where('type','SUMINISTRO')->get();
        return view('admin.projectsList')->with('projects', $projects); */
        return view('client.projects.supplies');
    }
    public function showAdvances(){
        return view('client.projects.advances.advance');
    }
    public function showGallery(){
        return view('client.projects.advances.gallery');
    }
}