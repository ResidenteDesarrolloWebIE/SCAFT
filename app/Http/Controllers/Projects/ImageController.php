<?php

namespace App\Http\Controllers\Projects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function save(Request $request){
        /* $form_data = $request->all();
        $validator = Validator::make($form_data, Image::$rules, Image::$messages);
        if ($validator->fails()) {
            return Response::json(['error' => true,'message' => $validator->messages()->first(),'code' => 400], 400);
        }  
        $image = $form_data['file'];
        $idProject = $form_data['idProject'];
        $extension = $image->getClientOriginalExtension();
        $folioOffer = $form_data['folioOffer'];
        $folioProject = $form_data['folioProject'];
        $typeProject = $form_data['typeProject'];
        $date = Carbon::now();

        $idImage = Image::latest('created_at')->first();
        if(is_null($idImage)){$countImage = 0;}
        else{$countImage = $idImage->id +1;}

        $nameImage = $folioOffer.'_'.$folioProject.'_'.$date->format('d-m-Y').'_'.str_replace(":", "-", $date->toTimeString()).'_'.$countImage.'.'.$extension; 
        $ruta = '/Galeria/'.$folioOffer.'/'.$folioProject.'/Galeria/'.$typeProject.'/'.$nameImage;
        Storage::disk('local')->put($ruta, \File::get($image));
        
        $projectImage = new Image;
        $projectImage->name= $nameImage;
        $projectImage->size= $image->getClientSize();
        $projectImage->project_id = $idProject;
        $projectImage->save();
 */
        return Response::json(['error' => false,'code'  => 200,'message' => "Imagen cargada correctamente"], 200);
    }
}
