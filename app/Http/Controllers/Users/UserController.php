<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
   public function showUsers(Request $request){
       dd('holaa');
   	}

   /*public function create(Request $request){

    dd($request);
        /*$existQuotation = Project::where('folio', $request->folioProject)->first();
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
                
                return response()->json(['error' => false,'message' => 'La cotizacion fue creada correctamente','code' => 200], 200);
            } catch (\Throwable $th) {
                echo("El error ocurrido es el siguiente: ".$th);
                return abort(response()->json(["message" => 'La cotizacion no pudo ser creada'], 400));
            }
        }*/
    //}
}
