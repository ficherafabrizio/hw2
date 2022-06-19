@extends('layouts.access')

@section('title','Login - LifeJourney')

@section('script/style')
    <link rel='stylesheet' href='{{ asset('css/login.css') }}'>
    <script src='{{ asset('js/login.js') }}' defer></script>
@endsection
 
@section('content')
    <h2>Login</h2>
    <p class='errore hidden' id="hiddenmsg">
        Devi riempire tutti i campi.
    </p>
    <p class=errore>
        {{Session()->get('errore')}}
    </p>
        
    <form name='nome_form' method='post' action='login'>
        @csrf
        <label>Nome utente <input type='text' name='username' value='{{ old("username") }}'></label>
        <label>Password <input type='password' name='password' value='{{ old("password") }}'></label>
        <label>&nbsp;<input type='submit' value='login' id="loginbutton"></label>
    </form>
@endsection

@section('otheraccess')
    <p id="regdiv">
        Non hai un account? <br> <a href='register' id="reglink">Registrati</a>
    </p>
@endsection
