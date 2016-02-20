@extends('layout.admin')

@section('content')

    @include('admin.common.breadcrumb', [
        'mainTitle' => 'Quizz',
        'icon' => 'fa-gamepad',
        'links' => [
            'Quizz' => 'quizz.index',
        ]
    ])

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-search fa-info"></i> Informations
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <p>Voici quelques informations concernant la gestion des quizzs :</p>
                    <ul>
                        <li>Le quizz actif est surligné en vert dans la liste.</li>
                        <li>Un quizz ne peut être valide que si le nombre de question associé à ce quizz est supèrieur
                            ou égale au nombre de question du quizz.
                        </li>
                        <li>Seulement un seul quizz peut être actif (un quizz invalide ne peut pas être actif).</li>
                    </ul>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel .chat-panel -->
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @if (session('error-status'))
                @include('admin.common.flash-message', ['type' => 'danger', 'message' => session('error-status')])
            @endif
            @if (session('status'))
                @include('admin.common.flash-message', ['type' => 'success', 'message' => session('status')])
            @endif
            <table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Thème</th>
                    <th>Questions</th>
                    <th>Actif</th>
                    <th>Pèriode</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($entities as $entity)
                    @if(!$entity->actif)
                    <tr>
                    @else
                    <tr style="background-color: #8BC9AC;">
                    @endif
                        <td>{{$entity->label}}</td>
                        <td>{{$entity->theme->label}}</td>
                        @if(count($entity->questions) < $entity->max_question)
                            <td>
                                <span class="label label-warning">{{count($entity->questions)}} / {{$entity->max_question}} - <em>invalide</em></span>
                            </td>
                        @else
                            <td>
                                <span class="label label-success">{{count($entity->questions)}} / {{$entity->max_question}} - <em>valide</em></span>
                            </td>
                        @endif
                        <td>
                            @if(!$entity->actif)
                                <button type="button" class="btn btn-xs btn-default btn-actif-popover"
                                        data-toggle="popover" title="Activer ce quizz ?"
                                        data-content="
                                        <form action='{{ route('quizz.update.state') }}' method='post'>
                                            <input type='hidden' name='quizzId' value='{{$entity->id}}' />
                                            <input type='hidden' name='actif' value='1' />
                                            <input type='submit' value='OK' class='btn btn-success' />
                                        </form>">
                                        <i class="fa fa-hand-pointer-o"></i>
                                        Non actif
                                </button>
                            @else
                                <button type="button" class="btn btn-xs btn-success btn-actif-popover"
                                        data-toggle="popover" title="Désactiver ce quizz ?"
                                        data-content="
                                        <form action='{{ route('quizz.update.state') }}' method='post'>
                                            <input type='hidden' name='quizzId' value='{{$entity->id}}' />
                                            <input type='hidden' name='actif' value='0' />
                                            <input type='submit' value='OK' class='btn btn-success' />
                                        </form>">
                                        <i class="fa fa-hand-pointer-o"></i>
                                        Actif
                                </button>
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
    </div>
@endsection

@section('javascript')
    <script>
        var route = "{{ route('quizz.update.state') }}";
        $('.btn-actif-popover').popover({
            placement:'top',
            html:true
        })
    </script>
@endsection

