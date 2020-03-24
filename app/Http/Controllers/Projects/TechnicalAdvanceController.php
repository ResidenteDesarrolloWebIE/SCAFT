<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Projects\TechnicalAdvance;
use Illuminate\Http\Request;

class TechnicalAdvanceController extends Controller
{
    public function edit(Request $request)
    {
        try {
            $technicalAdvance = TechnicalAdvance::where('id',$request->technicalAdvance)->first();
            $technicalAdvance->receive_order = $request->receiveOrder;
            $technicalAdvance->engineering_release = $request->engineeringRelease;
            $technicalAdvance->work_progress = $request->workProgress;
            $technicalAdvance->delivery_customer = $request->deliveryCustomer;
            $technicalAdvance->save();
            return response()->json(["message" => 'El avance fue editada correctamente'], 200);
        } catch (\Throwable $th) {
            echo ("El error ocurrido es el siguiente: " . $th);
            return abort(response()->json(["message" => 'El avance no pudo ser editado'], 400));
        }
    }
}
