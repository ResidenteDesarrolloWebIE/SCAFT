<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Projects\Contact;
use App\Models\UserDetails\Role;
use Illuminate\Support\Facades\Storage;
use App\User;


class UserController extends Controller
{
	public function showUsers(Request $request)
	{


		$roles = Role::where('name', '<>', 'Consulta')->where('name', '<>', 'Cliente')->get();
		$users = User::with("contacts", "roles")->get();
		return view('admin.users.users', compact('users', 'roles'));
	}

	public function create(Request $request)
	{
		$existEmail = User::where('email', $request->emailUser)->first();
		if (!is_null($existEmail)) {
			return abort(response()->json(['message' => 'El E-mail ingresado esta duplicado'], 400));
		} else {
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

				$file=$request->file('profilePicture');
				$hour = str_replace(":", "", date("h:i:s"));
				$fullName = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();
				$filename = explode('.' . $extension, $fullName)[0] . $hour . "." . $extension;

				$path = 'DOCUMENTOS/FOTOS_DE_PERFIL' .$user->name . '/' . $filename;
				Storage::disk('imagenes')->put($path, \File::get($file)); 
				$contact->profile_picture =  $path; 
				$contact->save();

				if (!is_null($request->roles)) {
					$user->roles()->attach($request->roles);
					$user->roles()->attach(Role::where('name', 'Consulta')->first());
				} else {
					if ($request->typeUser == "EMPLEADO") {
						$user->roles()->attach(Role::where('name', 'Consulta')->first());
					} else {
						$user->roles()->attach(Role::where('name', 'Cliente')->first());
					}
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
	public function edit(Request $request)
	{
		try {
			$user = User::with('roles')->where('id', $request->user)->first();
			$contact = Contact::where('id', $request->contact)->first();
			$user->name = $request->nameUserEdit;
			$user->email =  $request->emailUserEdit;
			if ($request->passwordUserEdit) {
				$user->password = Hash::make($request->passwordUserEdit);
			}
			$contact->job_position = $request->puestoUserEdit;
			$contact->cellphone = $request->cellUserEdit;

			if (!is_null($request->rolesEdit)) {
				$user->roles()->sync($request->rolesEdit);
				$user->roles()->attach(Role::where('name', 'Consulta')->first());
			} else {
				if (is_null($user->code)) {/* Empleado */
					$user->roles()->sync(Role::where('name', 'Consulta')->first());
				} else {
					$user->roles()->sync(Role::where('name', 'Cliente')->first());
				}
			}
			$user->save();
			$contact->save();
			return response()->json(['error' => false, 'message' => 'El usuario fue editado correctamente', 'code' => 200], 200);
		} catch (\Throwable $error) {
			echo ("El error ocurrido es el siguiente: " . $error);
			return abort(response()->json(["message" => 'El usuario no pudo ser editado'], 400));
		}
	}
}
