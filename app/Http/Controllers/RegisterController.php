<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller{

    public function register(){
        $request = request();

        if($this->errorCheck($request) == true){
            $newUser = new User;
            $newUser->username = $request['username'];
            $newUser->password = $request['password'];
            $newUser->save();
            if($newUser){
                Session::put('user_id',$request['username']);
                return redirect('home');
            }else{
                return redirect('register')->withInput();
            }
        }else{
            return redirect('register')->withInput();
        }
    }

    private function errorCheck($credenziali){

        if(preg_match('/^(?=.{5,20}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/',$credenziali['password'])){
            if (User::where('username', $credenziali['username'])->exists()) {
                $msg = "Username già in uso";
                $this->displayError($msg);
            }else{
                return true;
            }
        }else{
            $msg = "Password non valida.";
            $this->displayError($msg);
        }

    }

    protected function displayError($error){

        return redirect('register')->with(["error" => $error])->withInput();
    }

    public function checkLogged(){
        if((Session::get('user_id',0))==0){
            return view('register');
        }else{
            return redirect('home');
        }
    }

    
}