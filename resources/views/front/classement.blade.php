@extends('layout.front')

@section('title')
    <div class="image-bg-fluid-height">
        <img class="img-responsive img-center" src="{{ url('/css/images/logo.png') }}" alt="">
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(window).load(function() {

            $('table.paginated').each(function() {
                var currentPage = 0;
                var numPerPage = 15;
                var $table = $(this);
                $table.bind('repaginate', function() {
                    $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
                });
                $table.trigger('repaginate');
                var numRows = $table.find('tbody tr').length;
                var numPages = Math.ceil(numRows / numPerPage);
                var $pager = $('<ul class="pagination"></ul>');

                for (var page = 0; page < numPages; page++) {
                    var li = $('<li class="page-number"><a href="#"></a></li>');

                    li.find('a').text(page + 1).bind('click', {
                        newPage: page
                    }, function(event) {
                        currentPage = event.data['newPage'];
                        $table.trigger('repaginate');
                    });

                    li.appendTo($pager);

                }
                $pager.insertAfter($table);
            });

        });
    </script>
@endsection

@section('content')

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
                            <strong>Classement</strong>
                        </h2>
                        <hr>
                        <div class="col-md-6 col-md-offset-3 page_classement">
                            @if($startClassement)
                                <table id="tab_classement" class="table table-striped paginated">
                                    <thead>
                                        <tr>
                                            <th>Position</th>
                                            <th>Nom</th>
                                            <th>Profil</th>
                                            <th>Score</th>
                                            <th>Temps</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=1;$i<50;$i++)
                                            <tr>
                                                <td>#{{$i}}</td>
                                                <td>Alvin</td>
                                                <td><a href="">Alvin Gégé</a></td>
                                                <td>35/35</td>
                                                <td>60s</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            @else
                                <blockquote>
                                    Les résultats finaux seront disponible <br>
                                    lorsque le quizz arrivera à sa date échéante.
                                </blockquote>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

