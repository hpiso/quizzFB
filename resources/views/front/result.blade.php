<!DOCTYPE html>
<html>
<head>
    <title>Quizz ESGI</title>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
    <link href='css/front.css' rel='stylesheet' type='text/css'>
    <link href="css/social-buttons.css" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="content">
        <h1 class="title">Résultat</h1>
        <div class="row">
            <div class="collection">
                <h5 class="title">Félicitations Jolan</h5>
                <p class="collection-item">Votre score :</p>
                <div class="collection-item">
                    <div class="col s6">
                        <p>Date de fin : {{$endingDate}}</p>
                    </div>
                    <div class="col s6">
                        <p>Nombre de participants : 150</p>
                    </div>
                    <div class="col s6">
                        <button class="waves-effect waves-light btn partage"><a class="sb min facebook"></a>Partager</button>
                    </div>
                    <div class="col s6">
                        @if($startClassement)
                                            <button onclick="window.location='{{ url("classement") }}" class="btn ">Classement</button>
                                    </div>
                                </div>
                            </div>
                        @else
                                    <button class="btn disabled">Classement</button>
                                </div>
                            </div>
                        </div>
                        <blockquote>
                            L'ensemble des résultats finaux seront disponible <br>
                            lorsque le quizz arrivera à sa date échéante.
                        </blockquote>
                        @endif

        </div>
    </div>
</div>
</body>
</html>

