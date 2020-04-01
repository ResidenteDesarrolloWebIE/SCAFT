<?php

namespace App\Http\Controllers\Projects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects\Minuta;
class AgreementController extends Controller
{
    public function index(Request $request, $id){
        try {
            $minuta = Minuta::with('agreements')->find($id);
            
            return view('admin.projects.viewAgreements')->with('minuta',$minuta);
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
