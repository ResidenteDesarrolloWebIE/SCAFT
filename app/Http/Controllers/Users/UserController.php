<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
   public function showUsers(Request $request)
   {
   		$users=User::all();
   		dd($users);
   		return view('admin.users.users')->with('users', $users);
   	
   }

  
}
