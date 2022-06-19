<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller{
    
    public function checkLogged(){
        if((Session::get('user_id',0))==0){
            return redirect('homepage');
        }else{
            return view('home');
        }
    }
}