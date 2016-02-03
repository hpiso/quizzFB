<!DOCTYPE html>
<html>
<head>
    <title>Quizz ESGI</title>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
    <link href='css/front.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
    <script src="js/front.js"></script>


</head>
<body>
<div class="container">
    <div class="content">
        <h1 class="title">Quizz {{ $quizz->theme->label }}</h1><div id="compteRebour"></div>
        <div class="row liste_questions">
            <form method="GET" action={{url('result')}}>
                @foreach($tabQuest as $quest)
                    <div class="questions col s12 " id="{{$quest->id}}">
                        {{--Generate Questions--}}
                    </div>
                @endforeach
            </form>
                <div id="pagingControls"></div>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    nextPage(0);
</script>