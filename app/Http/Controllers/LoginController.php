<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller{

    public function login(){
        $request = request();
        if(User::where('username', $request['username'])->exists()){
            $user = User::find($request['username']);
            if($user->password == $request['password']){
                Session::put('user_id',$user->username);
                return redirect('home');
            }else{
                $error = "Password errata";
                return redirect('login')->withInput()->with(["errore" => $error]);
            }
        }else{
            $error = "L'username non esiste";
            return redirect('login')->withInput()->with(["errore" => $error]);
        }
    }
    
    public function checkLogged(){
        if((Session::get('user_id',0))==0){
            return view('login');
        }else{
            return redirect('home');
        }
    }
}