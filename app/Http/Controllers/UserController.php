<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function showCustomer(){
        $clients = User::whereHas('roles', function (Builder $query) {
            $query->where('name', '=', 'client');
        })->get();
    }
}
