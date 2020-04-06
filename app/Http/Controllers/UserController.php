<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Projects\Contact;
use App\Models\UserDetails\Role;
use App\User;


class UserController extends Controller
{
   public function showUsers(Request $request){

   		
   		$roles=Role::where('name', '<>', 'Consulta')->get();
   		$users = User::with("contacts")->get();

   		//dd($users[4]->contacts[0]->cellphone);
   		return view('admin.users.users',compact('users','roles'));
   	
   }

   public function create(Request $request)
   {
   		
        $existEmail = User::where('email', $request->emailUser)->first();


        if (!is_null($existEmail)) {
        	return abort(response()->json(['message' => 'El e-mail ingresado esta duplicado'], 400));
        }else{
        	try {
        		$password = Hash::make($request->passwordUser);
        		
		        DB::beginTransaction();
		        $user = new User();
		        $user->name = trim($request->nameUser);
		        $user->email = trim($request->emailUser);
		        $user->password = trim($password);
		        if (!is_null($request->codeUser)) {
		        	$user->code = trim($request->codeUser);
		        }
		        $user->save();
		        
		        $contact = new Contact();
		        $contact->name = trim($request->nameUser);
		        $contact->job_position = trim($request->puestoUser);
		        $contact->cellphone = trim($request->cellUser);
		        $contact->email = trim($request->emailUser);
		        $contact->user_id = $user->id;
		        $contact->save();

		        if (!is_null($request->idRoles)) {
            
                    $user->roles()->attach($request->idRoles);
                    $user->roles()->attach(Role::where('name', 'Consulta')->first());
                }else{
                	$user->roles()->attach(Role::where('name', 'Consulta')->first());
                }
		        DB::commit();
		        return response()->json(['error' => false, 'message' => 'El usuario fue creado correctamente', 'code' => 200], 200);
		        
        	} catch (\Throwable $error) {
                DB::rollBack();
                echo ("El error ocurrido es el siguiente: " . $error);
                return abort(response()->json(["message" => 'El usuario no pudo ser creado'], 400));
        	}
        }

   }
}
