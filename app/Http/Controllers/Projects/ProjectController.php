<?php

namespace App\Http\Controllers\Projects;

use App\Models\Projects\AffiliationProject;
use App\Models\Projects\TechnicalAdvance;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Projects\EconomicAdvance;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Projects\AditionalDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Projects\Project;
use App\Models\Projects\Offer;
use App\Models\Projects\File;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Collection;

class ProjectController extends Controller{
    public function showProjects(){
        /* $project = Project::search("yyy")->get(); */ /* Para filtar por (folio,name,estatus/descripcion)*/
        $clients = User::whereHas('roles', function (Builder $query) {$query->where('name', '=', 'Cliente');})->get();
        $projects = Project::with(['customer', 'technicalAdvances', 'economicAdvances', 'affiliations', 'images', 'coin', 'type', 'offer', 'purchaseOrder','aditionals_details'])->orderBy('id', 'asc')->get();
        foreach ($projects as $project) {
            $project->sum_total_amoun = $project->total_amount + $project->aditionals_Details->sum('total_amount');
            $project->selectStatusReceiveOrder = "";$project->inputStatusEngineeringRelease = "";
            $project->inputStatusWorkProgress = "";$project->inputStatusDeliveryCustomer = "";
            $project->selectStatus = "";$project->inputStatus = "";
            /* Avance tecnico */
            if(!Auth::user()->hasAnyRole(['Administrador','Ofertas']) ){$project->selectStatusReceiveOrder = "disabled";} /* Recepcion de orden */
            if(!Auth::user()->hasAnyRole(['Administrador','ingenieria']) ){$project->inputStatusEngineeringRelease = "readonly";} /* Liberacion de ingenieria */
            if(Auth::user()->hasAnyRole(['Administrador','Manufactura','Servicio']) ){/* Avance de trabajos */
                if(Auth::user()->hasRole('Manufactura') && $project->type->name=="SUMINISTRO"){
                    $project->inputStatusWorkProgress = "readonly";
                }elseif(Auth::user()->hasRole('Servicio') && $project->type->name=="SERVICIO"){
                    $project->inputStatusWorkProgress = "readonly";
                }
            }else{
                $project->inputStatusWorkProgress = "readonly";
            }
            if(Auth::user()->hasAnyRole(['Administrador','Almacen','Servicio']) ){ /* Entrega al cliente */
                if(Auth::user()->hasRole('Almacen') && $project->type->name=="SERVICIO"){
                    $project->inputStatusDeliveryCustomer = "readonly";
                }elseif(Auth::user()->hasRole('Servicio') && $project->type->name=="SUMINISTRO"){
                    $project->inputStatusDeliveryCustomer = "readonly";
                }
            }else{
                $project->inputStatusDeliveryCustomer = "readonly";
            }

            /* Avance economico */
            if(!Auth::user()->hasAnyRole(['Administrador','Finanzas'])){
                $project->selectStatus = "disabled";
                $project->inputStatus = "readonly";
            }
            $related="";
            foreach ($project->affiliations as $affiliation) {
                $related = $related.$affiliation->folio." ";
            }
            $project->related =  trim($related);
        }
        return view('admin.projects.projects',compact('projects','clients'));
    }
    /* $count = User::where('votes', '  W F>', 100)->count(); */
    public function showProjectsByClient(Request $request){
        $result = Project::where('customer_id', $request->idCustomer)->get();
        return response()->json(["projects" => $result]);
    }

    public function editProjectsByClient(Request $request){
        $result = Project::where('customer_id', $request->idCustomer)->where('id', '<>', $request->idProject)->get();
        return response()->json(["projects" => $result]);
    }

    public function create(Request $request){
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

                $file = $request->file('offerProject');
                $hour = str_replace(":", "", date("h:i:s"));
                $fullName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $filename  = explode('.'.$extension,$fullName)[0].$hour.".".$extension;
                

                $path = 'DOCUMENTOS/' . $typeProject . '/' . $request->initialsProject . trim($request->folioProjectCreate) . '/OFERTAS/'.$filename;
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


    public function edit(Request $request){
        try {
            $project = Project::with('type')->where('id', $request->project)->first();
            $project->status = trim($request->statusProjectEdit);
            $project->coin_id = trim($request->coinProjectEdit);
            if (!is_null($request->totalAmountEdit)){
                $project->total_amount = $request->totalAmountEdit;
            }
            if (!is_null($request->affiliationProjectEdit)) {
                $affiliatedProjects = AffiliationProject::where('project_id', $project->id)->orWhere('affiliation_project_id', $project->id);
                $affiliatedProjects->delete();
                $project->affiliations()->sync($request->affiliationProjectEdit);
                foreach ($request->affiliationProjectEdit as $affiliation) {
                    $projectAux = Project::find($affiliation);
                    $projectAux->affiliations()->sync($project->id, false);
                }
            } else {
                $affiliatedProjects = AffiliationProject::where('project_id', $project->id)->orWhere('affiliation_project_id', $project->id);
                $affiliatedProjects->delete();
            }
            $project->save();
            if(!is_null($request->totalAmountsProjectsEdit)){
                for($i=0; $i < count($request->totalAmountsProjectsEdit); $i++){
                    $aditionalDetail = new AditionalDetails();
                    $aditionalDetail->total_Amount = $request->btnSigno[$i].$request->totalAmountsProjectsEdit[$i];
                    $aditionalDetail->note =  $request->notesProjectsEdit[$i];

                    $file_offer = $request->offersProjectsEdit[$i];

                    $fullNameOffer = $file_offer->getClientOriginalName();
                    $extensionOffer = $file_offer->getClientOriginalExtension();
                    $filename_offer  = explode('.'.$extensionOffer,$fullNameOffer)[0].str_replace(":", "", date("h:i:s")).".".$extensionOffer;

                    $path_offer = 'DOCUMENTOS/' . $project->type->name . 'S/' . $project->folio . '/OFERTAS/'.$filename_offer;
                    $offer = new File();
                    $offer->name = $filename_offer;
                    $offer->path = $path_offer;
                    $offer->save();
                    Storage::disk('local')->put($path_offer, \File::get($file_offer));

                    $file_purchase_order = $request->purchaseOrderProjectEdit[$i];

                    $fullNameOrder = $file_purchase_order->getClientOriginalName();
                    $extensionOrder = $file_purchase_order->getClientOriginalExtension();
                    $filename_purchase_order  = explode('.'.$extensionOrder,$fullNameOrder)[0].str_replace(":", "", date("h:i:s")).".".$extensionOrder;

                    $path_purchase_order = 'DOCUMENTOS/' . $project->type->name . 'S/' . $project->folio . '/ORDENES_DE_COMPRA/'.$filename_purchase_order;
                    $purchase_order = new File();
                    $purchase_order->name = $filename_purchase_order;
                    $purchase_order->path = $path_purchase_order;
                    $purchase_order->save();

                    Storage::disk('local')->put($path_purchase_order, \File::get($file_purchase_order));

                    $aditionalDetail->offer = $offer->id;
                    $aditionalDetail->purchase_order = $purchase_order->id;
                    $aditionalDetail->project_id = $project->id;
                    $aditionalDetail->save();
                }
            }

            return response()->json(["message" => 'El proyecto fue editado correctamente'], 200);

        } catch (\Throwable $th) {
            echo ("El error ocurrido es el siguiente: " . $th);
            return abort(response()->json(["message" => 'El proyecto no pudo ser editado'], 400));
        }
    }

    /* Retornar vista para los clientes */
    public function showServices(Request $request){
        if (Auth::check()) {
            $idCustomer = Auth::id();
            /* $project = Project::search("yyy")->get(); */
            $projects = Project::search($request->search)->where('project_type_id', 2)->where('customer_id', $idCustomer)->get();
            foreach ($projects as $project) {
                if (strlen($project->description) > 55) {
                    $project->description = substr($project->description, 0, 55) . "...";
                }
                if($project->status == "PENDIENTE"){/* Inicio Modificacion */
                    $project->color_text = "orange";
                }elseif($project->status == "PROCESO"){
                    $project->color_text = "green" ;
                }elseif($project->status == "TERMINADO"){
                    $project->color_text = "yellow";
                }elseif($project->status == "CANCELADO"){
                    $project->color_text = "red";
                }/* Fin Modificacion */
            }
            return view('client.projects.services')->with('projects', $projects);
        }
    }

    public function showSupplies(Request $request){
        if (Auth::check()) {
            $idCustomer = Auth::id();
            $projects = Project::search($request->search)->where('project_type_id', 1)->where('customer_id', $idCustomer)->get();
            foreach ($projects as $project) {
                if (strlen($project->description) > 55) {
                    $project->description = substr($project->description, 0, 55) . "...";
                }
                if($project->status == "PENDIENTE"){/* Inicio Modificacion */
                    $project->color_text = "orange";
                }elseif($project->status == "PROCESO"){
                    $project->color_text = "green" ;
                }elseif($project->status == "TERMINADO"){
                    $project->color_text = "yellow";
                }elseif($project->status == "CANCELADO"){
                    $project->color_text = "red";
                }/* Fin Modificacion */
            }
            return view('client.projects.supplies')->with('projects', $projects);
        }
    }



    public function showAdvances(Request $request,  $idProject, $typeProject){
        if (Auth::check()) {
            $idCustomer = Auth::id();
            $project = Project::with(['technicalAdvances', 'economicAdvances','customer','affiliations','type','coin','images','offer','purchaseOrder','aditionals_details',
                'minutes'=> function($query){$query->where('type', 'like', '%EXTERNA%');}])
                ->where('project_type_id', $typeProject)->where('customer_id', $idCustomer)->where('id',$idProject)->first();

            $project->sum_total_amoun = $project->total_amount + $project->aditionals_Details->sum('total_amount');
            return view('client.projects.advances.advance')->with('project', $project);
        }
    }
    public function showGallery(Request $request,  $idProject, $typeProject){
        if (Auth::check()) {
            $idCustomer = Auth::id();
            $project = Project::with(['images'])->where('project_type_id', $typeProject)->where('customer_id', $idCustomer)->where('id',$idProject)->first();
            return view('client.projects.advances.gallery')->with('project', $project);
        }
    }
}
