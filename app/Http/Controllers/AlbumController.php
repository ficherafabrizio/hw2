<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Canzone;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AlbumController extends Controller{
    
    public function addSong(){
        $track = request()->track;
        $nome = request()->nome;
        if($this->having($track)==true){
            return;
        }else{
            $user = User::find(Session::get('user_id'));

            $canzone = new Canzone;
            $canzone->track = $track;
            $canzone->nome = $nome;
            $canzone->save();

            $newSong = Canzone::find($track);
            $user->canzone()->attach($newSong->track);
        }

    }
    private function having($track){
        $user = User::find(Session::get('user_id'));
        if($user->canzone()->find($track)){
            return true;
        }else{
            return false;
        }
    }

    public function removeTrack($id){
        $canzone = Canzone::find($id);
        $canzone->delete();
    }

    public function searchSongOnline(){
        $token = request()->hiddeninput;
        $nome = request()->searchbox;

        $data = http_build_query(array("q" => $nome, "type" => "track"));
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://api.spotify.com/v1/search?".$data);
        $headers = array("Authorization: Bearer ".$token);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);

        curl_close($curl);

        $tracks = json_decode($result)->tracks;

        return json_encode($tracks);

        
    }

    public function searchSong(){
        $nome = request()->searchbox;

        $output = array();
        $user = User::find(Session::get('user_id'));
        $rows = $user->canzone()->where('nome','like','%'.$nome.'%')->get();

        foreach($rows as $row){
            $output[] = $row->track;
        }
        return json_encode($output);
    }

    public function getTracksInfo(){
        $token = request()->token;
        $track = request()->track;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://api.spotify.com/v1/tracks/".$track);
        $headers = array("Authorization: Bearer ".$token);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }

    public function getUserTracks(){
        $user = User::find(Session::get('user_id'));
        $output = array();
        foreach($user->canzone as $canzone){
            $output[] = $canzone->track;
        }

        return json_encode($output);
    }

    public function getToken(){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://accounts.spotify.com/api/token");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $headers = array("Authorization: Basic ".base64_encode(env('SPOTIFY_CLIENT_ID').":".env('SPOTIFY_CLIENT_SECRET')));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);

        $token = json_decode($result)->access_token;
        return $token;
    }

    public function checkLogged(){
        if((Session::get('user_id',0))==0){
            return redirect('homepage');
        }else{
            return view('album');
        }
    }
}