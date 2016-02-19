@extends('layout.front')

@section('title')
    <div class="image-bg-fluid-height">
        <img class="img-responsive img-center" src="{{ url('/css/images/logo.png') }}" alt="">
    </div>
@endsection

@section('content')
    @if($already)
        <div id="address-bar" class="address-bar">Quiquizz t'invite à partager ton score</div>
    @else
        <div id="address-bar" class="address-bar">Quiquizz vous invite à commencer son test</div>
    @endif


    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        @if($already)
                            <a id="nav_btn" href="{{ route('front.result') }}" class="hvr-shutter-out-vertical">Ton résultat</a>
                        @else
                            <a id="nav_btn" href="{{ route('front.question') }}" class="hvr-shutter-out-vertical">Commencer le Quizz</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <h1 class="brand-name">Quizz : {{ $quizz->theme->label }}</h1>
                    <hr class="tagline-divider">
                    <h3><strong>{{$quizz->description}}</strong></h3>
                    <br><br><br>
                    <div class="col-lg-6 col-lg-offset-3 infos_index">
                        <div class="col-lg-6">
                            <p><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Date de début : {{ date('d/m/Y', strtotime($quizz->starting_at)) }}</p>
                            <p><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Date de fin : {{ date('d/m/Y', strtotime($quizz->ending_at)) }}</p>
                        </div>
                        <div class="col-lg-6">
                            <p><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Nombre de questions : {{$quizz->max_question}}</p>
                            <p><span class="glyphicon glyphicon-hourglass" aria-hidden="true"></span> Temps par question : 150s</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
