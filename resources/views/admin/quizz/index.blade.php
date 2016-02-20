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
                                <button type="button" class="btn btn-xs btn-warning btn-actif-popover"
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

