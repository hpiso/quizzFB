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
            <?php $i=0;
                $j=1;
            ?>
            <form action="#">
                <div id="content_pager">
                    @foreach($quizz->questions as $question)
                        <div class="page">
                            <div class="questions col s12 ">
                                <h5><small>{{ $j }}/{{count($quizz->questions )}}</small>....{{ $question->label }}</h5><br>
                                @foreach($question->answers as $rep )
                                    <div class="col s6">
                                        <p>
                                            <input name="group{!! $j !!}" type="radio" id={!! $i !!} />
                                            <label for={!! $i !!}>{{ $rep->label }}</label>
                                        </p>
                                    </div>
                                    <?php $i++; ?>
                                @endforeach
                            </div>
                        </div>
                        <?php $j++; ?>
                    @endforeach
                </div>
                <button id="subForm" class="btn waves-effect waves-light blue" type="submit" name="action">Valider
                </button>
            </form>
                <div id="pagingControls"></div>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    var pager = new Imtech.Pager();
    $(document).ready(function() {
        pager.paragraphsPerPage = 1;
        pager.pagingContainer = $('#content_pager');
        pager.paragraphs = $('div.page', pager.pagingContainer);
        pager.showPage(1);
    });
</script>