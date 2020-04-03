<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;


class UserController extends Controller
{
   public function showUsers(Request $request){
   		$users=User::all();
   		return view('admin.users.users')->with('users', $users);
   	
   }

   public function create(Request $request)
   {
   		dd($request);
        $existEmail = User::where('email', $request);
   		$existQuotation = Project::where('folio', $request->initialsProject . trim($request->folioProjectCreate))->first();
        if (!is_null($existQuotation)) {
            return abort(response()->json(["message" => 'El folio ingresado esta duplicado'], 400));
        } else {
            try {

                DB::beginTransaction();
                $project = new Project();
                $project->folio = $request->initialsProject . trim($request->folioProjectCreate);
                $project->name = trim($request->nameProject);
                $project->substation = trim($request->substationProject);
                $project->status = 'PENDIENTE';
                if (!is_null($request->exchangeRate)) {
                    $project->exchange_rate = $request->exchangeRate;
                }
                $project->total_amount = $request->totalAmountProject;
                $project->description = trim($request->descriptionProject);
                $project->project_type_id = $request->typeProject;
                $project->coin_id = $request->coinProject;
                $project->customer_id = $request->clientProject;
                $project->save();

                $economicAdvance = new EconomicAdvance();
                $economicAdvance->project_id = $project->id;
                $economicAdvance->save();

                $technicalAdvance = new TechnicalAdvance();
                $technicalAdvance->project_id = $project->id;
                $technicalAdvance->save();

                if (!is_null($request->affiliationProject)) {
                    $project->affiliations()->attach($request->affiliationProject);
                    foreach ($request->affiliationProject as $affiliation) {
                        $projectAux = Project::find($affiliation);
                        $projectAux->affiliations()->sync($project->id, false);
                    }
                }
                if ($request->typeProject == 1) {
                    $typeProject = "SUMINISTROS";
                } else {
                    $typeProject = "SERVICIOS";
                }

                $hour = str_replace(":", "", date("h:i:s"));
                $file = $request->file('offerProject');
                $filename  =  $hour . $file->getClientOriginalName();
                $path = 'DOCUMENTOS/' . $typeProject . '/' . $request->initialsProject . trim($request->folioProjectCreate) . '/OFERTAS/' . $filename;
                Storage::disk('local')->put($path, \File::get($file));

                $file = new File();
                $file->name = $filename;
                $file->path = $path;
                $file->save();

                $offer = new Offer();
                $offer->project_id = $project->id;
                $offer->file_id = $file->id;
                $offer->save();
                DB::commit();
                return response()->json(['error' => false, 'message' => 'El proyecto fue creada correctamente', 'code' => 200], 200);
            } catch (\Throwable $error) {
                DB::rollBack();
                echo ("El error ocurrido es el siguiente: " . $error);
                return abort(response()->json(["message" => 'El proyecto no pudo ser creado'], 400));
            }
        }
   }



  
}
