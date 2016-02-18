@extends('layout.front')

@section('content')
        <h1 class="title">Résultat</h1>
        <div class="row">
            <div class="collection">
                <h5 class="title">Félicitations {{ ucfirst(Auth::user()->first_name) }}</h5>
                <p class="collection-item">Votre score :</p>
                <div class="collection-item">
                    <div class="col s6">
                        <p>Date de fin : {{$endingDate}}</p>
                    </div>
                    <div class="col s6">
                        <p>Nombre de participants : 150</p>
                    </div>
                    <div class="col s6">
                        <button class="waves-effect waves-light btn partage"><a class="sb min facebook"></a>Partager</button>
                    </div>
                    <div class="col s6">
                        @if($startClassement)
                            <button onClick="location.href='{{ url("classement") }}'" class="btn">Classement</button>
                                </div>
                            </div>
                        </div>
                        @else
                            <button class="btn disabled">Classement</button>
                            </div>
                            </div>
                            </div>
                            <blockquote>
                                L'ensemble des résultats finaux seront disponible <br>
                                lorsque le quizz arrivera à sa date échéante.
                            </blockquote>
                        @endif
        </div>
@endsection
