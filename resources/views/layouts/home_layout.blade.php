<!DOCTYPE html>
<html>
    <head>
        <title>@yield('titolo')</title>
        <meta charset="utf-8">
        <meta name="viewport"content="width=device-width, initial-scale=1">
        @yield('script/style')
    </head>
    <body>
        <nav>
            @yield('backbutton')
            <a href='diary' id="diario_nav" class="nav_links">Diario</a>
            <a href='home' id="logo">LifeJourney</a>
            <a href='album' id='music_nav' class="nav_links">Album Musicale</a>
            <a href="logout" id="logout_nav">logout</a>
        </nav>
        @yield('content')
        <footer>
            <p>
                1000007725 &nbsp;  <a href="https://www.github.com/ficherafabrizio/hw2">HW2</a>
            </p>
        </footer>
    </body>
</html>