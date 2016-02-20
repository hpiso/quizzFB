@extends('layout.admin')

@section('content')

    @include('admin.common.breadcrumb', [
        'mainTitle' => 'Dasboard',
        'icon' => 'fa-dashboard',
        'links' => [
            'Dashboard' => 'dashboard.index',
        ]
    ])

    <div class="row">
        @include('admin.common.panelItem', [
            'title' => 'Quizz',
            'colorTheme' => 'primary',
            'icon' => 'gamepad',
            'route' => 'quizz.index',
            'totalNumber' => count($quizzs)
        ])

        @include('admin.common.panelItem', [
            'title' => 'Questions',
            'colorTheme' => 'green',
            'icon' => 'question',
            'route' => 'question.index',
            'totalNumber' => count($questions)
        ])

        @include('admin.common.panelItem', [
           'title' => 'Themes',
           'colorTheme' => 'yellow',
           'icon' => 'picture-o',
           'route' => 'theme.index',
           'totalNumber' => count($themes)
       ])

        @include('admin.common.panelItem', [
           'title' => 'Users',
           'colorTheme' => 'red',
           'icon' => 'users',
           'route' => 'users.index',
           'totalNumber' => count($users)
       ])
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Taux de bonnes / mauvaises réponses du quizz actuel
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="flot-chart">
                        @if ($actifQuizz)
                            <div class="flot-chart-content" id="flot-pie-chart"></div>
                        @else
                           <em>Aucun quizz actif pour le moment</em>
                        @endif
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
@endsection

@section('javascript')

<script type="text/javascript" src="{{ url('/js/flot/excanvas.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/js/flot/jquery.flot.js') }}"></script>
<script type="text/javascript" src="{{ url('/js/flot/jquery.flot.pie.js') }}"></script>
<script type="text/javascript" src="{{ url('/js/flot/jquery.flot.resize.js') }}"></script>
<script type="text/javascript" src="{{ url('/js/flot/jquery.flot.time.js') }}"></script>
<script type="text/javascript" src="{{ url('/js/flot/jquery.flot.tooltip.min.js') }}"></script>

<script>
    //Flot Pie Chart
    $(function() {

        var data = [{
            label: "Bonnes réponses",
            color: "#5CB85C",
            data: "{{ $goodAnswerNbr }}"
        }, {
            label: "Mauvaises réponses",
            color: "#D9534F",
            data: "{{ $badAnswerNbr }}"
        }];

        var plotObj = $.plot($("#flot-pie-chart"), data, {
            series: {
                pie: {
                    innerRadius: 0.4,
                    show: true
                }
            },
            grid: {
                hoverable: true
            },
            tooltip: true,
            tooltipOpts: {
                content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false
            }
        });

    });
</script>
@endsection
