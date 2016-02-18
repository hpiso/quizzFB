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

            <table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Thème</th>
                    <th>Nombre de question</th>
                    <th>Actif</th>
                    <th>Pèriode</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($entities as $entity)
                    <tr>
                        <td>{{$entity->label}}</td>
                        <td>{{$entity->theme->label}}</td>
                        <td>{{$entity->max_question}} / {{count($entity->questions)}}</td>
                        <td>
                            @if(!$entity->actif)
                                <span class="label label-warning">Non actif</span>
                            @else
                                <span class="label label-success">Actif</span>
                            @endif
                        </td>
                        <td>{{ date('d M Y', strtotime($entity->starting_at)) }} au {{ date('d M Y', strtotime($entity->ending_at)) }}</td>
                        <td>
                            <a href="{{ route('quizz.show', ['id' => $entity->id]) }}" class="btn btn-default btn-circle"><i class="fa fa-eye"></i> </a>
                            <a href="{{ route('quizz.edit', ['id' => $entity->id]) }}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i> </a>
                            <a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#{{$entity->id}}"><i class="fa fa-trash"></i> </a>
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
        </div>
        <!-- /.col-lg-12 -->
    </div>


@endsection

