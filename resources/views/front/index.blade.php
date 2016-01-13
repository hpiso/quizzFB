<!DOCTYPE html>
<html>
<head>
    <title>Quizz ESGI</title>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
    <link href='css/front.css' rel='stylesheet' type='text/css'>

</head>
<body>
<div class="container">
    <div class="content">
        <h1 class="title">Quizz ESGI</h1>
        <div class="row">
            <div class="collection">
                <h5 class="title">Quizz : {{ $quizz->theme->label }}</h5>
                <p class="collection-item">Créé par : <a href="/" class="chip">Jolan Levy</a><span class="badge">Le :   20/12/15</span></p>
                <div class="collection-item">
                    <div class="col s6">
                        <p>Date de début : {{$startingDate}}</p>
                        <p>Date de fin : {{$endingDate}}</p>
                    </div>
                    <div class="col s6">
                        <p>Nombre de questions : {{$quizz->max_question}}</p>
                        <p>Nombre de participants : 150</p>
                    </div>
                </div>
            </div>
        </div>
        <a href={{url('quizz')}} class="waves-effect waves-light btn-large" >Commencer le Quizz</a><br>
    </div>
</div>
</body>
</html>
