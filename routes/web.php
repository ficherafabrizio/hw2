<?php

use App\Models\Pagina;
use App\Models\User;
use App\Models\Canzone;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/prova',function(){
    $track = '0cfTmOAORo6FhOkHW2sG86';
    $user = User::find('utente1');
    if($user->canzone()->find('0RZUN6TaQUGLOqqDfrRPQU')){
        echo "esiste";
    }else{
        echo "non esiste";
    }
});

Route::get('/', function(){ return redirect('homepage'); });
Route::get('/homepage', 'App\\Http\\Controllers\\HomepageController@checkLogged');


Route::get('/register', 'App\\Http\\Controllers\\RegisterController@checkLogged');
Route::post('/register','App\\Http\\Controllers\\RegisterController@register');

Route::get('/login','App\\Http\\Controllers\\LoginController@checkLogged');
Route::post('/login','App\\Http\\Controllers\\LoginController@login');

Route::get('/home','App\\Http\\Controllers\\HomeController@checkLogged');

Route::get('/logout',function(){
    Session::flush();
    return redirect('homepage');
});

Route::get('/album','App\\Http\\Controllers\\AlbumController@checkLogged');
Route::get('/album/get_spotify_token','App\\Http\\Controllers\\AlbumController@getToken');
Route::get('/album/get_user_tracks','App\\Http\\Controllers\\AlbumController@getUserTracks');
Route::post('/album/get_tracks_info','App\\Http\\Controllers\\AlbumController@getTracksInfo');
Route::post('/album/search_song','App\\Http\\Controllers\\AlbumController@searchSong');
Route::post('/album/search_song_online','App\\Http\\Controllers\\AlbumController@searchSongOnline');
Route::get('/album/removeTrack/{id}','App\\Http\\Controllers\\AlbumController@removeTrack');
Route::post('/album/add_song','App\\Http\\Controllers\\AlbumController@addSong');

Route::get('/diary','App\\Http\\Controllers\\DiaryController@checkLogged');
Route::get('/diary/get_date','App\\Http\\Controllers\\DiaryController@getDate');
Route::post('/diary/check_page','App\\Http\\Controllers\\DiaryController@checkPage');
Route::post('/diary/search_page','App\\Http\\Controllers\\DiaryController@searchPage');
Route::post('/diary/update_page','App\\Http\\Controllers\\DiaryController@updatePage');