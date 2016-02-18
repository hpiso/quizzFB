@extends('layout.admin')

@section('content')

    @include('admin.common.breadcrumb', [
        'mainTitle' => 'Utilisateurs',
        'links' => [
            'Utilisateurs' => 'user.index',
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
                    <form method="get" action="{{ route('users.index') }}" class="form-inline">
                        <div class="form-group">
                            <label for="quizz">Quizz</label>
                            <select class="form-control" id="quizz" name="quizz">
                                <option value="all">--- Tous ---</option>
                                @foreach($quizzs as $quizz)
                                    <option value="{{ $quizz->id }}"
                                            @if(Request::get('quizz')==$quizz->id) selected="selected" @endif >{{ $quizz->label }}</option>
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
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Facebook ID</th>
                    <th>Nom</th>
                    <th>Sexe</th>
                    <th>Age</th>
                    <th>Emplacement</th>
                    @if(Request::get('quizz') == 'all')
                        <th>Participation(s) et score(s)</th>
                    @else
                        <th>Score</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $user)
                    <tr>
                        <td><a href="https://facebook.com/{{ $user->id }}" target="_blank">{{ $user->id }}</a></td>
                        <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                        <td>{{ $user->gender == "male" ? 'Masculin' : 'Feminin' }}</td>
                        <td>{{ isset($user->age) ? $user->age : 'Inconnu'  }}</td>
                        <td>{{ isset($user->city) && isset($user->country) ? $user->city . ', ' . $user->country : 'Inconnu'  }}</td>
                        <td>
                            @if(count($user->scores) > 0)
                                @foreach($user->scores as $score)
                                    @if( Request::get('quizz') == 'all')
                                        <span class="label label-success">{{ $score->quizz->label . ' (' . $score->score . ')' }}</span>
                                    @else
                                        <span class="label label-success">{{ $user->scores[0]->score }}</span>
                                    @endif
                                @endforeach
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('users.export') }}" class="btn btn-primary btn-small">Exporter la liste de tous les
                utilisateurs</a>
        </div>
        <!-- /.col-lg-12 -->
    </div>

@endsection

