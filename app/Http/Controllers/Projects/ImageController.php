<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Projects\Project;
use App\Models\Projects\Image;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ImageController extends Controller{
    public function save(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), Image::$rules, Image::$messages);
            if ($validator->fails()) {
                return Response::json(['error' => true, 'message' => $validator->messages()->first(), 'code' => 400], 400);
            }
            $image = $request['file'];
            $date = Carbon::now();
            $imageLasted = Image::latest('created_at')->where('project_id', $request['idProject'])->first();

            if (is_null($imageLasted)) {
                $idImage = 0;
            } else {
                $idImage = explode(".", explode("_", $imageLasted->name)[1])[0]; /* fecha _ 1.png */
            }
            if ($request['typeProject'] == 1) {
                $typeProject = "SUMINISTROS";
            } elseif ($request['typeProject'] == 2) {
                $typeProject = "SERVICIOS";
            }
            $imageName  =  $date->format('d-m-Y') . "_" . (intval($idImage) + 1) . "." . $image->getClientOriginalExtension();
            $path = 'DOCUMENTOS/' . $typeProject . '/' . $request['folioProject'] . '/IMAGENES/' . $imageName;
            Storage::disk('local')->put($path, \File::get($image));

            $projectImage = new Image;
            $projectImage->name = $imageName;
            $projectImage->path = $path;
            $projectImage->size = $image->getClientSize();
            $projectImage->project_id = $request['idProject'];
            $projectImage->save();
            return response()->json(['error' => false, 'code'  => 200,'imageName'=>$imageName, 'message' => "Imagen cargada correctamente"], 200);
        } catch (\Throwable $error) {
            echo ($error);
        }
    }



    public function showImages(Request $request)
    {
        $project = Project::with('images', 'type')->where('id', $request->id)->first();

        $path = 'DOCUMENTOS/' . $project->type->name . 'S' . '/' . $project->folio . '/IMAGENES/';
        $imageAnswer = [];
        foreach ($project->images as $image) {
            $imageAnswer[] = [
                'original' => $image->name,
                'server' => Storage::url($path . $image->name),
                'size' => $image->size
            ];
        }
        return response()->json(['images' => $imageAnswer]);
    }


    public function delete(Request $request){
        try {
            if ($request->typeProject == 1) {
                $typeProject =  'SUMINISTROS';
            } else {
                $typeProject =  'SERVICIOS';
            }
            if (!$request->name) {
                return 0;
            }
            $image = Image::where('name', '=', $request->name)->first();

            if (!empty($image)) {
                $path = 'DOCUMENTOS/' . $typeProject . '/' . $request->folioProject . '/IMAGENES/';
                $image->delete();
                Storage::delete($image->path);
                return Response::json(['error' => false, 'message' => 'La imagen fue eliminada correctamente', 'code'  => 200], 200);
            } else {
                echo ("La imagen no fue encontrada: " . $image);
                return abort(response()->json(["message" => 'La imagen no pudo ser eliminada'], 400));
            }
        } catch (\Throwable $error) {
            echo ("El error ocurrido es el siguiente: " . $error);
            return abort(response()->json(["message" => 'La imagen no pudo ser eliminada'], 400));
        }
    }
}
