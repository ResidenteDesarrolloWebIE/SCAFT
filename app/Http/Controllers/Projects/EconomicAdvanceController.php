<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Projects\EconomicAdvance;
use Illuminate\Http\Request;

class EconomicAdvanceController extends Controller
{
    public function edit(Request $request)
    {
        try {
            $economicAdvance = EconomicAdvance::where('id', $request->economicAdvance)->first();
            $economicAdvance->advance = $request->advance;
            $economicAdvance->engineering_release_payment = $request->engineeringReleasePayment;
            $economicAdvance->final_payment = $request->finalPayment;
            $economicAdvance->total = $request->total;
            $economicAdvance->save();
            return response()->json(["message" => 'El avance fue editado correctamente'], 200);
        } catch (\Throwable $th) {
            echo ("El error ocurrido es el siguiente: " . $th);
            return abort(response()->json(["message" => 'El avance no pudo ser editado'], 400));
        }
    }
}
