@extends('layout.front')

@section('content')

        <h1 class="title">Classement</h1>
        @if($startClassement)
            <table id="tab_classement" class="bordered highlight paginated">
                <thead>
                <tr>
                    <th scope="col">Position</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Profil</th>
                    <th scope="col">Score</th>
                    <th scope="col">Temps</th>
                </tr>
                </thead>
                <tbody>
                    @for($i=0;$i<50;$i++)
                        <tr>
                            <td>#1</td>
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
                var $pager = $('<ul class="pagination pager"></ul>');
                var $pager2 = $('<ul class="pagination pager"></ul>');
                for (var page = 0; page < numPages; page++) {

                    $('<li class="waves-effect page-number"></li>').text(page + 1).bind('click', {
                        newPage: page
                    }, function(event) {
                        currentPage = event.data['newPage'];
                        $table.trigger('repaginate');
                        console.log(currentPage);
                        $(this).addClass('active').siblings().removeClass('active');
                    }).appendTo($pager);

                }
                var copie = $($pager).clone();
                copie.appendTo($pager2);
                $pager.insertBefore($table).find('li.page-number:first').addClass('active');
                $pager2.insertAfter($table).find('li.page-number:first').addClass('active');
            });

        });
    </script>
@endsection