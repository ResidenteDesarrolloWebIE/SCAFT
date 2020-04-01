<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Projects\File;
use App\Models\Projects\TechnicalAdvance;
use App\Models\Projects\PurchaseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TechnicalAdvanceController extends Controller
{
    public function edit(Request $request){
        try {
            $technicalAdvance = TechnicalAdvance::with('project.type')->where('id', $request->technicalAdvance)->first();
            if (is_null($request->receiveOrder) || $request->receiveOrder == 100) {
                $technicalAdvance->receive_order = 100;
            } else {
                $technicalAdvance->receive_order = 0;
            }
            $technicalAdvance->engineering_release = $request->engineeringRelease;
            $technicalAdvance->work_progress = $request->workProgress;
            $technicalAdvance->delivery_customer = $request->deliveryCustomer;
            $technicalAdvance->save();


            $hour = str_replace(":", "", date("h:i:s"));
            $file = $request->purchaseOrder;
            $filename  =  $hour . $file->getClientOriginalName();
            $path = 'DOCUMENTOS/' . $technicalAdvance->project->type->name.'S'. '/' . $technicalAdvance->project->folio . '/ORDENES_DE_COMPRA/' . $filename;
            Storage::disk('local')->put($path, \File::get($file));

            $file = new File();
            $file->name = $filename;
            $file->path = $path;
            $file->save();

            $purchaseOrder = new PurchaseOrder();
            $purchaseOrder->project_id = $technicalAdvance->project->id;
            $purchaseOrder->file_id = $file->id;
            $purchaseOrder->save();

            return response()->json(["message" => 'El avance fue editada correctamente'], 200);
        } catch (\Throwable $th) {
            echo ("El error ocurrido es el siguiente: " . $th);
            return abort(response()->json(["message" => 'El avance no pudo ser editado'], 400));
        }
    }
}
