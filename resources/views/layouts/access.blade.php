<!doctype html>
<html>
    <head>
        <title>@yield('title')</title>
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
        <meta charset="utf-8">
        <meta name="viewport"content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='{{ asset('css/access.css') }}'>
        @yield('script/style')
    </head>
    <body>
        <header><a href="homepage" id="backimg"><img src="images/backicon.png" /></a>&nbsp;</header>
        <h1>LifeJourney</h1>
        <main>
            @yield('content')
        </main>
        @yield('otheraccess')
        <footer>
            <p>
                1000007725 &nbsp;  <a href="https://www.github.com/ficherafabrizio/hw2">HW2</a>
            </p>
        </footer>
    </body>
</html>