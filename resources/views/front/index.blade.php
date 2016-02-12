@extends('layout.front')

@section('content')

    <h1 class="title">Quizz ESGI</h1>
        <div class="row">
            <div class="collection">
                <h5 class="title">Quizz : {{ $quizz->theme->label }}</h5>
                <p class="collection-item">{{$quizz->description}}</p>
                <div class="collection-item">
                    <div class="col s6">
                    </div>
                    <div class="col s6">
                    </div>
                </div>
            </div>
        </div>
        <a id="btn-menu" href="{{ route('front.question') }}" class="waves-effect waves-light btn-large">Commencer le Quizz</a><br>
@endsection
