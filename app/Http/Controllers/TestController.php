<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class TestController extends Controller
{
    public function show(Request $request){
        $users=User::all();
   		return view('admin.users.users')->with('users', $users);
    }
}
