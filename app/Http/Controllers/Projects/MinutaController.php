<?php


namespace App\Http\Controllers\Projects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects\Minuta;
use App\Models\Projects\Project;
use App\Models\Projects\Agreement;
use Carbon\Carbon;
use App\User;
use App\Models\Projects\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
            $minuta->type = $request->typeMinuta;
            $minuta->issue = $request->issue;
            $minuta->meeting_place = $request->meeting_place;
            $minuta->objective = $request->objective;
            $minuta->user_id = Auth::user()->id;
            //Se convierten los asistentes y las dependencias a un string con formato JSON
            $json='{"nombres": [';
            for($i=0; $i<count($request->assistants);$i++){
                if(($i+1)!=count($request->assistants)){
                    $json = $json.'"'.$request->assistants[$i].'",';
                }else{
                    $json = $json.'"'.$request->assistants[$i].'"';
                }
            }
            $json=$json.'],';
            $json=$json.'"dependencias": [';
            for($i=0; $i<count($request->dependences);$i++){
                if(($i+1)!=count($request->dependences)){
                    $json = $json.'"'.$request->dependences[$i].'",';
                }else{
                    $json = $json.'"'.$request->dependences[$i].'"';
                }
            }
            $json=$json.']}';
            $minuta->assistants = $json;
            $minuta->project_id = $request->project_id;
            $minuta->save();

            
            for($i=0; $i < count($request->acuerdos); $i++){
                $agreement = new Agreement();
                $agreement->agreement = $request->acuerdos[$i];
                $agreement->responsable = $request->responsables[$i];
                $agreement->status = 'REGISTRADO';
                $agreement->start_date = Carbon::parse($request->dateStart[$i])->format('Y-m-d');
                $agreement->end_date = Carbon::parse($request->dateEnd[$i])->format('Y-m-d');
                $agreement->minuta_id = $minuta->id;
                $agreement->save();
            }
            return response()->json(['Message'=>'Exito']);   
        } catch (\Exception $e) {
            dd($e);
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
                }else if($number>=10 && $number < 100){
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

    public function getAgreements(Request $request, $id){
        try {
            $minuta = Minuta::with('agreements')->find($id);
            return response()->json($minuta);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function exportPDF(Request $request, $id){
        try {
            $minuta = Minuta::with('agreements')->find($id);
            $user = User::find($minuta->user_id);
            $assistants = json_decode($minuta->assistants);
            $project = Project::with('customer')->find($minuta->project_id);
            $pdf = \PDF::loadView('exports.minuteReport', compact('minuta','user','assistants','project'));
            return $pdf->download('Minuta '.$minuta->folio.'.pdf');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function showPDF(Request $request, $id){
        try {
            $minuta = Minuta::with('agreements')->find($id);
            $user = User::find($minuta->user_id);
            $assistants = json_decode($minuta->assistants);
            $project = Project::with('customer')->find($minuta->project_id);
            $pdf = \PDF::loadView('exports.minuteReport', compact('minuta','user','assistants','project'));
            return $pdf->stream('Minuta '.$minuta->folio.'.pdf');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function saveMinutaSigned(Request $request){
        try {
            $minuta = Minuta::find($request->minuteId);
            $project = Project::with('type')->find($minuta->project_id);
            $hour = str_replace(":", "", date("h:i:s"));
            $file = $request->file('minuteSigned');
            $filename  =  $hour . $file->getClientOriginalName();
            $path = 'DOCUMENTOS/' . $project->type->name . 'S/' . $project->folio . '/MINUTA_FIRMADA/' . $filename;
            Storage::disk('local')->put($path, \File::get($file));

            $file = new File();
            $file->name = $filename;
            $file->path = $path;
            $file->save();

            $minuta->file_id = $file->id;
            $minuta->save();

            return response()->json(['msg'=>'exito']);
            
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function downloadSignedMinute(Request $request,$id){
        $file = File::find($id);
        return Storage::download($file->path);
    }
}
