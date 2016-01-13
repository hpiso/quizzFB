@extends('layout.admin')

@section('content')
    @include('admin.common.breadcrumb', [
       'mainTitle' => 'Question',
       'links' => [
           'Question' => 'question.index',
       ]
   ])

    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-search fa-fw"></i> Filtre
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form method="post" action="{{route('question.filter')}}" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="quizz" class="col-sm-3 control-label">Quizz</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="quizz" name="quizz">
                                        <option value="{{null}}">--- Tous ---</option>
                                    @foreach($quizzs as $quizz)
                                        <option value="{{$quizz->id}}">{{$quizz->label}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quizz" class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Rechercher</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel .chat-panel -->
        </div>
        <div class="col-lg-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <i class="fa fa-search fa-fw"></i> Informations
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-question fa-fw"></i> Liste des questions
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        @include('admin.common.flash-message', ['type' => 'success', 'message' => session('status')])
                    @endif
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Question</th>
                            <th>Quizzs associé(s)</th>
                            <th>Créé en</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($entities as $key => $entity)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$entity->label}}</td>
                                <td>
                                    @if(count($entity->quizzs) > 0)
                                        @foreach($entity->quizzs as $quizz)
                                            <span class="label label-success">{{$quizz->label}}</span>
                                        @endforeach
                                    @else
                                        <span class="label label-warning">Aucun quizz associé</span>
                                    @endif
                                </td>
                                <td>{{$entity->created_at}}</td>
                                <td>
                                    <a href="{{ route('question.edit',['id' => $entity->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Modifier</a>
                                    <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$entity->id}}"><i class="fa fa-trash"></i> Supprimer</a>
                                    <a href="{{ route('question.show',['id' => $entity->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> Voir la question</a>
                                </td>
                            </tr>

                            {{--Popup for suppression--}}
                            @include('admin.common.modalSuppression', [
                                $entity,
                                'title' => 'question',
                                'formAction' => 'question.destroy',

                            ])

                        @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('question.create') }}" class="btn btn-primary btn-small">Créer une question</a>
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection