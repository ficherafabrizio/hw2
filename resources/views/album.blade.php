@extends('layouts.home_layout')

@section('titolo','Album - LifeJourney')

@section('script/style')
    <link rel="shortcut icon" href="{{ asset('favicon2.png') }}">
    <link rel='stylesheet' href='{{ asset('css/album.css') }}'>
    <script src='{{ asset('js/album.js') }}' defer></script>
    <script type="text/javascript">
    const CSRF_TOKEN = '{{ csrf_token() }}';
    </script>
@endsection

@section('backbutton')
<a href="home" id="backlink" class="nav_links"><img src='images/backicon.png'></a>
@endsection

@section('content')
    <main>
        <h1 id='title'>Il tuo album musicale:</h1>
        <form id="search_form" method="post" name="searchForm">
            @csrf
            <label>Cerca una canzone:<input type="search" name="searchbox">
                <input type="hidden" name="hiddeninput">
                <input type="submit" value='Cerca' id='localsearch' class="bottoni">
                <button id="onlinesearch"  class="bottoni">Cerca online</button>
                <img src="images/x.png" id="clear">
            </label>
        </form>
        <div id="songbox">
            
        </div>
    </main>
@endsection

