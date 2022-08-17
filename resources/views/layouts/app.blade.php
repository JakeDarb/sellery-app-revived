<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sellery</title>
    <livewire:styles />

    <link rel="stylesheet" href="{{ url('css/app.css') }}">
</head>
<header>
    <div class="header header--primary">
        <div class="header__component">
            <p>Sellery</p>
        </div>
        <div class="header__component header__component--last">
            @if(Auth::id())
                <a href="/logout" class="btn btn--danger">logout</a>
            @else
                <a href="/login" class="btn btn--success">login</a>
            @endif
        </div>
    </div>
    @if(Auth::id())
    <div class="header header--secondary">
        <div class="header__component">
            <p>{{Auth::user()->name}}</p>
        </div>
        <div class="header__component header__component--last">
            <a href="/products/create" class="btn btn--success">Zoekertje plaatsen</a>
        </div>
    </div>
    @endif
</header>
<body>

    @yield('content', 'Nothing to see here')
    <footer>
        <p>Sellery is niet aansprakelijk voor verkeerd gebruik van zijn services.</p>
        <p>Copyright © 2022 Sellery. Alle rechten voorbehouden.</p>
    </footer>
    <livewire:scripts />
</body>
</html>