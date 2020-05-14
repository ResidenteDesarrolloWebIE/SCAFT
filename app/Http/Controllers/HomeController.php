<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Auth;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->hasRole('Cliente')){
            $user = User::where('id',Auth::user()->id)->with('contacts')->get();
            return view('homeCustomer')->with('user',$user[0]);
        }else{
            return view('homeAdministrator');
        }
    }
    public function createStorageLink(){
        Artisan::call('storage:link');
    }
}
