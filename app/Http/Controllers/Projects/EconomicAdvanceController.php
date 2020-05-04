<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Projects\EconomicAdvance;
use App\Models\Projects\Project;
use App\Models\Projects\TechnicalAdvance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EconomicAdvanceController extends Controller
{
    public function edit(Request $request){
        try {
            DB::beginTransaction();
            $economicAdvance = EconomicAdvance::where('id', $request->economicAdvance)->first();
            $project = Project::with('technicalAdvances')->where('id',$economicAdvance->project->id)->first();
            $technicalAdvance = TechnicalAdvance::where('id',$project->technicalAdvances->id)->first();

            $economicAdvance->initial_advance_percentage = $request->initialAdvancePercentage;
            $economicAdvance->initial_advance_mount =  $request->initialAdvanceMount;
            if(!is_null($request->initialAdvanceCompleted)){
                $economicAdvance->initial_advance_completed =  $request->initialAdvanceCompleted;
            }
            $economicAdvance->engineering_release_payment_percentage =  $request->engineeringReleasePaymentPercentage;
            $economicAdvance->engineering_release_payment_mount =  $request->engineeringReleasePaymentMount;
            if(!is_null($request->engineeringReleasePaymentCompleted)){
                $economicAdvance->engineering_release_payment_completed =  $request->engineeringReleasePaymentCompleted;
            }
            $economicAdvance->final_payment_percentage =  $request->finalPaymentPercentage;
            $economicAdvance->final_payment_mount =  $request->finalPaymentMount;
            if(!is_null($request->finalPaymentCompleted)){
                $economicAdvance->final_payment_completed = $request->finalPaymentCompleted;
            }
            $economicAdvance->save();

            if($economicAdvance->initial_advance_percentage > 0){
                $project->status = "PROCESO";
                $project->save();
            }
            if($economicAdvance->final_payment_completed==1 &&  $technicalAdvance->delivery_customer==100){
                $project->status = "TERMINADO";
                $project->save();
            }
            DB::commit();
            return response()->json(["message" => 'El avance fue editado correctamente'], 200);
            
        } catch (\Throwable $th) {
            DB::rollBack();
            echo ("El error ocurrido es el siguiente: " . $th);
            return abort(response()->json(["message" => 'El avance no pudo ser editado'], 400));
        }
    }
}