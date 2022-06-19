<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomepageController extends Controller{
    
    public function checkLogged(){
        if((Session::get('user_id',0))==0){
            return view('homepage');
        }else{
            return redirect('home');
        }
    }
}