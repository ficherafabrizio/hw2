@extends('layouts.home_layout')

@section('titolo','Home - LifeJourney')

@section('script/style')
    <link rel='stylesheet' href='{{ asset('css/home.css') }}'>
@endsection
@section('content')
            <div id="bottomheader">
                <p>Benvenuto {{Session()->get('user_id')}}!</p>
            </div>
        <div id="cards">
            <a href="diary" id='diarycard'>Diario</a>
            <a href="album" id="musiccard">Album<br>Musicale</a>
        </div>
@endsection
