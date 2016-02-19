@extends('layout.front')

@section('title')
    <div class="image-bg-fluid-height">
        <img class="img-responsive img-center" src="{{ url('/css/images/logo.png') }}" alt="">
    </div>
@endsection

@section('content')

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a id="nav_btn" href="{{ route('front.index') }}" class="hvr-shutter-out-vertical">Accueil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <p><strong>Félicitations</strong></p>
                        <p>Score : {{$score}} / {{$quizz->max_question}}</p>
                        <p>Temps effectué : {{$time}} secondes</p>
                    </h2>
                    <hr>
                    <div class="collection col-md-6 col-md-offset-3">
                        <div class="col-md-6">
                            <p><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Date de fin : {{$endingDate}}</p>
                        </div>
                        <div class="col-md-6">
                            <p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Nombre de participants : ADEFINIR</p>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-default btn-md btn_partage">
                                <a class="sb min facebook"></a> Partager
                            </button>
                        </div>
                        <div class="col-md-6">
                        @if($startClassement)
                                <button onClick="location.href='{{ url("classement") }}'" type="button" class="btn btn-default btn-md btn_classement">
                                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>  Classement
                                </button>
                            </div>
                        @else
                            <button type="button" class="btn btn-default btn-md btn_classement disabled">
                                <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>  Classement
                            </button>
                            </div>
                            <blockquote>
                                L'ensemble des résultats finaux seront disponible
                                lorsque le quizz arrivera à sa date échéante.
                            </blockquote>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
