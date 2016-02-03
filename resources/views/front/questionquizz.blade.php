<script>
    clearTimeout(timeout);
    rebour(15, {{$numQuest+1}}, {{$nbQuest}});
</script>
<h5>
    <small>{{ $numQuest+1 }}/{{$nbQuest}}</small>
    ....{{ $question->label }}</h5>
<br>
<?php $random=array(); ?>
@foreach($question->answers as $rep)
    <?php array_push($random,$rep) ?>
@endforeach
<?php shuffle($random); ?>
@foreach($random as $rep )
    <div class="col s6">
        <p>
            <input name="group[{!! $numQuest !!}]" type="radio" id={!! $rep->id !!} />
            <label for={!! $rep->id !!}>{{ $rep->label }}</label>
        </p>
    </div>
@endforeach
@if($numQuest+1==$nbQuest)
    <a href="#" id="subForm" class="btn btn-large waves-effect waves-light blue" onclick="process({{$question->id}}, {{$numQuest}}, restant);result();"> Valider </a>
@else
    <a href="#" id="butNext" class="btn-floating btn-large waves-effect waves-light blue" onclick="nextPage({{$numQuest+1}});process({{$question->id}}, {{$numQuest}}, restant);"> >> </a>
@endif
