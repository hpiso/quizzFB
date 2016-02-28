@extends('layout.front')

@section('title')

@endsection

@section('content')

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a id="nav_btn" href="{{ route('front.index') }}" onmouseover="this.style.background='{{$backgroundColor}}';" onmouseout="this.style.background='transparent'">
                            <i class="fa fa-chevron-right "></i> Accueil <i class="fa fa-chevron-left "></i>
                        </a>
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
                        <p><strong>Félicitations</strong>  {{ ucfirst(Auth::user()->first_name) }}</p>
                        <p>Score : {{$score}} / {{$quizz->max_question}}</p>
                        <p>Temps effectué : {{$time}}</p>
                    </h2>
                    <hr>
                    <div class="collection col-md-6 col-md-offset-3">
                        <div class="col-md-12">
                            <p><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Date de fin : {{ date('d M Y', strtotime($quizz->ending_at)) }}</p>
                        </div>
                        {{--<div class="col-md-6">--}}
                            {{--<p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Nombre de participants : ADEFINIR</p>--}}
                        {{--</div>--}}
                        <div class="col-md-6">
                            <button type="button" class="btn btn-md btn_partage">
                                <img src="{{ url('/css/images/icon-facebook.png') }}" alt="icon">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=quizzesgi.com" target="_blank"> Partager</a>
                            </button>
                        </div>
                        <div class="col-md-6">
                        @if($startClassement)
                                <button onClick="location.href='{{ url("classement") }}'" type="button" class="btn btn-md btn_classement">
                                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>  Classement
                                </button>
                            </div>
                        @else
                            <button type="button" class="btn btn-default btn-md btn_classement disabled">
                                <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>  Classement
                            </button>
                            </div>
                            <blockquote>
                                Les résultats seront disponnibles à la fin du quizz
                            </blockquote>
                        @endif
                    </div>
                </div>
            </div>
            @if(Auth::check() && Auth::user()->isAdmin())
                <div class="row">
                    <a href="{{ route('dashboard.index')  }}" class="btn btn-danger">Administration</a>
                </div>
        @endif
        </div>
    </div>
@endsection
