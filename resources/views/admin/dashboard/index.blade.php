@extends('layout.admin')

@section('content')

    @include('admin.common.breadcrumb', [
        'mainTitle' => 'Dasboard',
        'links' => [
            'Dashboard' => 'dashboard.index',
        ]
    ])

    <div class="row">
        @include('admin.common.panelItem', [
            'title' => 'Quizz',
            'colorTheme' => 'primary',
            'icon' => 'question-circle',
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
           'icon' => 'beer',
           'route' => 'theme.index',
           'totalNumber' => count($themes)
       ])

        @include('admin.common.panelItem', [
           'title' => 'Statistiques',
           'colorTheme' => 'red',
           'icon' => 'tasks',
           'route' => 'quizz.index',
           'totalNumber' => '0'
       ])
    </div>

@endsection

