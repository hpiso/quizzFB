<script>
    clearTimeout(timeout);
    rebour(15, {{$numQuest+1}}, {{count($quizz->questions )}});
</script>
<h5>
    <small>{{ $numQuest+1 }}/{{count($quizz->questions )}}</small>
    ....{{ $question->label }}</h5>
<br>
@foreach($question->answers as $rep )
    <div class="col s6">
        <p>
            <input name="group[{!! $numQuest !!}]" type="radio" id={!! $rep->id !!} />
            <label for={!! $rep->id !!}>{{ $rep->label }}</label>
        </p>
    </div>
@endforeach
@if($numQuest+1==count($quizz->questions ))
    <a href="#" id="subForm" class="btn btn-large waves-effect waves-light blue" onclick="result({{$question->id}})"> Valider </a>
@else
    <a href="#" id="butNext" class="btn-floating btn-large waves-effect waves-light blue" onclick="nextPage({{$numQuest+1}});result({{$question->id}});"> >> </a>
@endif
