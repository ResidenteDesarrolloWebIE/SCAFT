<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Projects\EconomicAdvance;
use App\Models\Projects\File;
use App\Models\Projects\Project;
use App\Models\Projects\TechnicalAdvance;
use App\Models\Projects\PurchaseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TechnicalAdvanceController extends Controller
{
    public function edit(Request $request){
        try {
            DB::beginTransaction();
            $technicalAdvance = TechnicalAdvance::with('project.type')->where('id', $request->technicalAdvance)->first();
            $project = Project::with('technicalAdvances')->where('id',$technicalAdvance ->project->id)->first();
            $economicAdvance = EconomicAdvance::where('id', $project->economicAdvances)->first();

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
            if(!is_null($request->purchaseOrder)){
                $file = $request->purchaseOrder;
                $filename  =  $hour . $file->getClientOriginalName();
                $path = 'DOCUMENTOS/' . $technicalAdvance->project->type->name.'S'. '/' . $technicalAdvance->project->folio . '/ORDENES_DE_COMPRA/'.$filename;
                Storage::disk('local')->put($path, \File::get($file)); 
                /* $file->storeAs($path,$filename); */
    
                $file = new File();
                $file->name = $filename;
                $file->path = $path;
                $file->save();
    
                $purchaseOrder = new PurchaseOrder();
                $purchaseOrder->project_id = $technicalAdvance->project->id;
                $purchaseOrder->file_id = $file->id;
                $purchaseOrder->save();
            }
            if($technicalAdvance->receive_order == 100){
                $project->status = "PROCESO";
                $project->save();
            }
            if($technicalAdvance->delivery_customer==100 && $economicAdvance->finalPaymentCompleted==1){
                $project->status = "TERMINADO";
                $project->save();
            }
            DB::commit();
            return response()->json(["message" => 'El avance fue editada correctamente'], 200);
            
        } catch (\Throwable $th) {
            DB::rollBack();
            echo ("El error ocurrido es el siguiente: " . $th);
            return abort(response()->json(["message" => 'El avance no pudo ser editado'], 400));
        }
    }
}
