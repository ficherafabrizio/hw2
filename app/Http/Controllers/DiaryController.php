<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Pagina;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DiaryController extends Controller{
    
    public function updatePage(){
        $request = request();

        $pagina = Pagina::where('user',Session::get('user_id'))
                        ->where('data',$request->datapagina)
                        ->first();
        if(Pagina::where('user',Session::get('user_id'))
                 ->where('data',$request->datapagina)
                 ->exists()){
            $pagina->contenuto = $request->pag;
            $pagina->save();
        }else{
            $newPagina = new Pagina;
            $newPagina->user = Session::get('user_id');
            $newPagina->data = $request->datapagina;
            $newPagina->contenuto = $request->pag;
            $newPagina->save();
        }
    }
    
    public function searchPage(){
        $request = request();
        $data = $request->data;

        $pagina = Pagina::where('user',Session::get('user_id'))
                          ->where('data',$data)
                          ->first();

        return response()->json(['contenuto' => $pagina->contenuto]);
    }
    
    public function checkPage(){
        $request = request();
        $data = $request->data;

        $num_rows = Pagina::where('user',Session::get('user_id'))
                     ->where('data',$data)
                     ->count();
        
        return $num_rows;
        
    }

    public function getDate(){
        return date("Y-m-d");
    }

    public function checkLogged(){
        if((Session::get('user_id',0))==0){
            return redirect('homepage');
        }else{
            return view('diary');
        }
    }
}