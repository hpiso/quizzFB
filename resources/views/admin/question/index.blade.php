@extends('layout.admin')

@section('content')
    @include('admin.common.breadcrumb', [
       'mainTitle' => 'Question',
       'links' => [
           'Question' => 'question.index',
       ]
   ])

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-search fa-fw"></i> Filtre
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form method="post" action="{{route('question.filter')}}" class="form-inline">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="quizz">Quizz</label>
                                <select class="form-control" id="quizz" name="quizz">
                                        <option value="{{null}}">--- Tous ---</option>
                                    @foreach($quizzs as $quizz)
                                        <option value="{{$quizz->id}}">{{$quizz->label}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </form>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel .chat-panel -->
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @if (session('status'))
                @include('admin.common.flash-message', ['type' => 'success', 'message' => session('status')])
            @endif
            <table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Question</th>
                    <th>Quizzs associé(s)</th>
                    <th>Réponses</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($entities as $key => $entity)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{ str_limit($entity->label, $limit = 40, $end = '...') }}</td>
                        <td>
                            @if(count($entity->quizzs) > 0)
                                @foreach($entity->quizzs as $quizz)
                                    <span class="label label-success">{{$quizz->label}}</span>
                                @endforeach
                            @else
                                <span class="label label-warning">Aucun quizz associé</span>
                            @endif
                        </td>
                        <td><span class="badge">{{count($entity->answers)}}</span></td>
                        <td>
                            <a href="{{ route('question.show',['id' => $entity->id]) }}" class="btn btn-default btn-circle"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('question.edit',['id' => $entity->id]) }}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#{{$entity->id}}"><i class="fa fa-trash"></i></a>
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
        <!-- /.col-lg-12 -->
    </div>
@endsection