<!DOCTYPE html>
<html>
<head>
    <title>Quizz ESGI</title>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
    <link href='css/front.css' rel='stylesheet' type='text/css'>
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
</head>
<body>
<div class="container">
    <div class="content">
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
    </div>
</div>
</div>
</body>
</html>
