<?php


namespace App\Http\Controllers\Projects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects\Minuta;
use App\Models\Projects\Project;
use App\Models\Projects\Agreement;

class MinutaController extends Controller
{
    public function index(Request $request, $id){
        $project = Project::with('minutes')->find($id);
        return view('admin.projects.viewMinutes')->with('minutes',$project->minutes)->with('project',$project);
    }

    public function storeMinuta(Request $request){
        try {
            $minuta = new Minuta();
            $minuta->folio = $request->folio;
            $minuta->type = 'INTERNA';
            $minuta->project_id = $request->project_id;
            $minuta->save();
            for($i=0; $i < count($request->acuerdos); $i++){
                $agreement = new Agreement();
                $agreement->agreement = $request->acuerdos[$i];
                $agreement->responsable = $request->responsables[$i];
                $agreement->start_date = $request->dateStart[$i];
                $agreement->end_date = $request->dateEnd[$i];
                $agreement->minuta_id = $minuta->id;
                $agreement->save();
            }
            return response()->json(['Message'=>'Exito']);   
        } catch (\Exception $e) {
            return response()->json(['Message'=>'Error']);
            
        }

    }

    public function generateFolio(Request $request){
        try {
            $minuta = Minuta::where('project_id','=',$request->project['id'])->orderBy('id','desc')->first();
            if($minuta == null){
               $minuta = "M20001";
               return response()->json(['folio'=>$minuta]);
            }else{
                $number = $minuta->folio;
                $number = substr($minuta->folio,3,3);
                $number++;
                if($number<10){
                    $folio= 'M2000'.$number;
                }else if($number>10 && $number < 100){
                    $folio = 'M200'.$number;
                }else{
                    $folio = 'M20'.$number;
                }
               return response()->json(['folio'=>$folio]);
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
