@extends('layout.front')

@section('content')
    <div class="row">
        <div class="col s12">
            <br><br><br>
            <div id="compteRebour"></div>
            <form method="post" action="{{ route('quizz.action') }}">
                <h5>{{$question->label}}</h5>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row liste_questions">
                    <br>
                    <?php $random=array(); ?>
                    @foreach($question->answers as $rep)
                        <?php array_push($random,$rep) ?>
                    @endforeach
                    <?php shuffle($random); ?>
                    @foreach($random as $rep )
                        <div class="col s6">
                            <p>
                                <input name="answer" value="{{$rep->id}}" type="radio" id="{{$rep->id}}" />
                                <label for="{{$rep->id}}">{{$rep->label}}</label>
                            </p>
                        </div>
                    @endforeach
                </div>
                @if($numQuest+1==$nbQuest)
                    <label for="subForm">
                        <input id="subForm" class="input btn btn-large waves-effect waves-light blue" type="submit" value="Valider">
                    </label>
                @else
                    <label for="butNext">
                        <input id="butNext" class="input btn-floating btn-large waves-effect waves-light blue" type="submit" value=">>">
                    </label>
                @endif
            </form>
        </div>
    </div>
    <script type="text/javascript">
        clearTimeout(timeout);
        rebour(15, {{$numQuest+1}}, {{$nbQuest}});
        var text = '<?php echo 'Question '.($numQuest+1).' sur '.$nbQuest; ?>';
        $('.nav-wrapper .nav-link').html(text);
        $('.nav-wrapper .brand-logo').removeAttr('href');
    </script>
@endsection