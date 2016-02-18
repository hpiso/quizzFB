<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quizz ESGI</title>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('front.common.global-css')
    @include('front.common.global-js')

</head>
<body>

<nav>
    <div class="nav-wrapper">
        <a href="/" class="brand-logo">Quizz ESGI</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            @if(Auth::check() && Auth::user()->isAdmin())
                <li><a id="btn-menu" class="nav-link" href="{{ route('dashboard.index') }}">Administration</a></li>
            @endif
        </ul>
    </div>
</nav>
<div class="container">
    <div class="content">
        @yield('content')
    </div>
</div>


@yield('javascript')
</body>
</html>