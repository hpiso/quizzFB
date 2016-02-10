@extends('layout.front')

@section('content')

    <h1 class="title">Quizz ESGI</h1>
        <div class="row">
            <div class="collection">
                <h5 class="title">Quizz : {{ $quizz->theme->label }}</h5>
                <p class="collection-item">{{$quizz->description}}</p>
                <div class="collection-item">
                    <div class="col s6">
                        <p>Date de début : {{$startingDate}}</p>
                        <p>Date de fin : {{$endingDate}}</p>
                    </div>
                    <div class="col s6">
                        <p>Nombre de questions : {{$quizz->max_question}}</p>
                        <p>Temps par question : 150s</p>
                    </div>
                </div>
            </div>
        </div>
        <a id="btn-menu" href={{url('quizz')}} class="waves-effect waves-light btn-large" >Commencer le Quizz</a><br>
@endsection
