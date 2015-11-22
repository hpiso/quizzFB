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
                            <a href="{{ route('theme.edit', ['id' => $entity->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Modifier</a>
                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#{{$entity->id}}"><i class="fa fa-trash"></i> Supprimer</a>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="{{$entity->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Suppression thème</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Etes vous sur de vouloir supprimer le thème <strong>{{$entity->label}}</strong> ?</p>
                                    <form method="delete" action="{{ route('theme.destroy',['id' => $entity->id]) }}">
                                        <input type="submit" class="btn btn-sm btn-default" value="Oui">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('theme.create') }}" class="btn btn-primary btn-small">Ajouter un thème</a>
        </div>
        <!-- /.col-lg-12 -->
    </div>

@endsection

