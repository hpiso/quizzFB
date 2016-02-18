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

@endsection

