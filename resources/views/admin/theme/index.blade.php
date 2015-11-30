@extends('layout.admin')

@section('content')

    @include('admin.common.breadcrumb', [
        'mainTitle' => 'Thème',
        'links' => [
            'Thème' => 'theme.index',
        ]
    ])

    <div class="row">
        <div class="col-lg-12">
            @if (session('status'))
                @include('admin.common.flash-message', ['type' => 'success', 'message' => session('status')])
            @endif
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($entities as $entity)
                    <tr>
                        <td>{{$entity->label}}</td>
                        <td>{{$entity->description}}</td>
                        <td>
                            <a href="{{ route('theme.edit', ['id' => $entity->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Modifier</a>
                            <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$entity->id}}"><i class="fa fa-trash"></i> Supprimer</a>
                        </td>
                    </tr>

                    {{--Popup for suppression--}}
                    @include('admin.common.modalSuppression', [
                        $entity,
                        'title' => 'thème',
                        'formAction' => 'theme.destroy',
                    ])

                @endforeach
                </tbody>
            </table>
            <a href="{{ route('theme.create') }}" class="btn btn-primary btn-small">Ajouter un thème</a>
        </div>
        <!-- /.col-lg-12 -->
    </div>

@endsection
