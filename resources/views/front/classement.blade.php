@extends('layout.front')

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
                            <strong>Classement</strong>
                        </h2>
                        <hr>
                        <div class="col-md-6 col-md-offset-3 page_classement">
                            @if($startClassement)
                                <table id="tab_classement" class="table table-striped paginated">
                                    <thead>
                                        <tr>
                                            <th>Position</th>
                                            <th>Profil</th>
                                            <th>Prenom</th>
                                            <th>Score</th>
                                            <th>Temps</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; ?>
                                        @foreach($classement as $score)
                                            <tr>
                                                <td>#{{$i}}</td>
                                                <td><a target="_blank" href="http://{{ $score['profil']}}"><img style="width:35px" src="{{ $score['avatar']}}"></a></td>
                                                <td>{{ $score['prenom']}}</td>
                                                <td>{{ $score['score']}}</td>
                                                <td>{{ $score['time']}}</td>
                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach
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

