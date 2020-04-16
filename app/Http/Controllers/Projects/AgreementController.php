<?php

namespace App\Http\Controllers\Projects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects\Minuta;
use App\Models\Projects\Agreement;
use Carbon\Carbon;
class AgreementController extends Controller
{
    public function index(Request $request, $id){
        try {
            $minuta = Minuta::with('agreements')->find($id);            
            return view('admin.projects.viewAgreements')->with('minuta',$minuta);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function update(Request $request){
        try {
            $agreement = Agreement::find($request->idAgreement);
            $agreement->agreement = $request->agreement;
            $agreement->responsable = $request->responsable;
            $agreement->status =  $request->status;;
            $agreement->start_date = Carbon::parse($request->dateStart)->format('Y-m-d');
            $agreement->end_date = Carbon::parse($request->dateEnd)->format('Y-m-d');
            $agreement->minuta_id = $request->idMinuta;
            $agreement->save();

            return response()->json(['Message'=>'Exito']);  
        } catch (\Exception $e) {
            return response()->json(['Message'=>'Error']);  
        }
    }

    public function save(Request $request){
        try {
            for($i=0; $i < count($request->acuerdos); $i++){
                $agreement = new Agreement();
                $agreement->agreement = $request->acuerdos[$i];
                $agreement->responsable = $request->responsables[$i];
                $agreement->status = 'REGISTRADO';
                $agreement->start_date = Carbon::parse($request->dateStart[$i])->format('Y-m-d');
                $agreement->end_date = Carbon::parse($request->dateEnd[$i])->format('Y-m-d');
                $agreement->minuta_id = $request->minutaId;
                $agreement->save();
            }
            return response()->json(['Message'=>'Exito']);
            
        } catch (\Exception $e) {
            dd($e);
        }
        
    }
}
