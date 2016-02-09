<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quizz ESGI</title>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link href='css/front.css' rel='stylesheet' type='text/css'>


</head>
<body>

<nav>
    <div class="nav-wrapper container">
        <a href="#" class="brand-logo">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a href="collapsible.html">JavaScript</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
@yield('javascript')
</body>
</html>