@extends('layout.admin')

@section('content')

    @include('admin.common.breadcrumb', [
        'mainTitle' => 'Question',
        'links' => [
            'Question' => 'question.index',
            'Ajouter une question' => 'question.create'
        ]
    ])

    <div class="row">
        <div class="col-lg-4">
            <h1>create</h1>
        </div>
    </div>

@endsection

