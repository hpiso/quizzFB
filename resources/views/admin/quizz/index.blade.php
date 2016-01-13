@extends('layout.admin')

@section('content')

    @include('admin.common.breadcrumb', [
        'mainTitle' => 'Quizz',
        'links' => [
            'Quizz' => 'quizz.index',
        ]
    ])

    <div class="row">
        <div class="col-lg-12">
            @if (session('status'))
                @include('admin.common.flash-message', ['type' => 'success', 'message' => session('status')])
            @endif

            <a href="{{ route('quizz.create') }}" class="btn btn-primary btn-small">Créer un quizz</a>
                <span>Ou</span>
            <a href="{{ route('question.index') }}" class="btn btn-primary btn-small">Ajouter des questions</a>

            <hr>

            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Thème</th>
                    <th>Maximum de question</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($entities as $entity)
                    <tr>
                        <td>{{$entity->label}}</td>
                        <td>{{$entity->theme->label}}</td>
                        <td>{{$entity->max_question}}</td>
                        <td>{{$entity->starting_at}}</td>
                        <td>{{$entity->ending_at}}</td>
                        <td>
                            <a href="{{ route('quizz.edit', ['id' => $entity->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Modifier</a>
                            <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$entity->id}}"><i class="fa fa-trash"></i> Supprimer</a>
                            <a href="{{ route('quizz.show', ['id' => $entity->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> Voir le quizz</a>
                        </td>
                    </tr>

                    {{--Popup for suppression--}}
                    @include('admin.common.modalSuppression', [
                        $entity,
                        'title' => 'quizz',
                        'formAction' => 'quizz.destroy',

                    ])
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('quizz.create') }}" class="btn btn-primary btn-small">Créer un quizz</a>
            <span>Ou</span>
            <a href="{{ route('question.index') }}" class="btn btn-primary btn-small">Ajouter des questions</a>
        </div>
        <!-- /.col-lg-12 -->
    </div>


@endsection

