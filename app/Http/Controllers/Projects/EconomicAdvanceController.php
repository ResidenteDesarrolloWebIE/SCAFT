<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Projects\EconomicAdvance;
use Illuminate\Http\Request;

class EconomicAdvanceController extends Controller
{
    public function edit(Request $request){
        try {
            $economicAdvance = EconomicAdvance::where('id', $request->economicAdvance)->first();
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
            return response()->json(["message" => 'El avance fue editado correctamente'], 200);
        } catch (\Throwable $th) {
            echo ("El error ocurrido es el siguiente: " . $th);
            return abort(response()->json(["message" => 'El avance no pudo ser editado'], 400));
        }
    }
}