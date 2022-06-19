@extends('layouts.access')

@section('title','Registrazione - LifeJourney')

@section('script/style')
    <link rel='stylesheet' href='{{ asset('css/register.css') }}'>
    <script src='{{ asset('js/register.js') }}' defer></script>
@endsection
 
@section('content')
        <h2>Registrazione</h2>
        <p class="hidden errore"  id="errore1">
            Dati non validi:<br>
            Assicurrati di usare un nome utente<br> e password tra le 5 e 20 lettere.<br>
            La password deve contenere almeno <br>una lettera maiuscola, una minuscola e un numero.
        </p>
        <p class="errore"  id="errore2">
            {{Session()->get('error')}}
        </p>
        <form name='nome_form' method='post' action="register">
                @csrf 
                <label>Nome utente <input type='text' name='username' value='{{ old("username") }}'></label>
                <label>Password <input type='password' name='password' value='{{ old("password") }}'></label>
                <label>&nbsp;<input type='submit' value='Crea account' id="regbutton"></label>
        </form>
@endsection

@section('otheraccess')
<p id="logindiv">
    Hai già un account? <br> <a href='login' id="loginlink">Login</a>
</p>
@endsection

