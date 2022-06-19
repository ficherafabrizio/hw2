@extends('layouts.home_layout')

@section('titolo','Diary - LifeJourney')

@section('script/style')
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <link rel='stylesheet' href='{{ asset('css/diary.css') }}'>
    <script src='{{ asset('js/diary.js') }}' defer></script>
@endsection

@section('backbutton')
<a href="home" id="backlink" class="nav_links"><img src='images/backicon_white.png'></a>
@endsection

@section('content')
    <main>
        <form id='datesearch' name="dateform" method="post">
            @csrf
            <label>Cerca una pagina: <input type="date" name="data" id="date_input">
            <input type="submit" value="Cerca" id="searchbutton"></label>
        </form>
        <div id="date_titolo">
            <h1 id="date"></h1>
            <span class='hidden' id="exceed_length">Impossibile salvare, non superare i 300 caratteri.</span>
        </div>
        <form id='id_form_pagina' name="formpagina" method="post">
            @csrf
            <input type= "hidden" name="datapagina"> 
            <textarea id="pagina" name="pag" placeholder="Inizia a scrivere..."></textarea>
            <input type="submit" value="Salva" id="savebutton">
        </form> 
    </main>
@endsection