@extends('layout.admin')

@section('content')

    @include('admin.common.breadcrumb', [
        'mainTitle' => 'Quizz',
        'icon' => 'fa-gamepad',
        'links' => [
            'Quizz' => 'quizz.index',
            'Modifier un quizz' => 'quizz.edit'
        ]
    ])

    <div class="row">
        <div class="col-lg-4">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="update" action="{{ route('quizz.update', ['id' => $quizz->id]) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="quizzLabel">Nom</label>
                    <input type="text" class="form-control" id="quizzLabel" name="label" value="{{$quizz->label}}" placeholder="Nom du thème">
                </div>
                <div class="form-group">
                    <label for="quizzDescription">Description</label>
                    <textarea class="form-control" id="quizzDescription" name="description" placeholder="Description">{{$quizz->description}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="quizzMaxNumber">Nombre de question</label>
                    <input type="number" class="form-control" value="{{$quizz->max_question}}" id="quizzMaxNumber" name="max_question">
                </div>
                <div class="form-group">
                    <label for="quizzStartDate">Date de début</label>
                    <input type="text" class="form-control date-picker" value="{{$quizz->starting_at}}" id="quizzStartDate" name="starting_at">
                </div>
                <div class="form-group">
                    <label for="quizzEndDate">Date de fin</label>
                    <input type="text" class="form-control date-picker" value="{{$quizz->ending_at}}" id="quizzEndDate" name="end_at">
                </div>
                <div class="form-group">
                    <label for="quizzTheme">Thème</label>
                    <select class="form-control" id="quizzTheme" name="id_theme">
                        @foreach($items as $item)
                            @if($quizz->theme->id == $item->id)
                                <option selected value="{{$item->id}}">{{$item->label}}</option>
                            @else
                                <option value="{{$item->id}}">{{$item->label}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-default">Envoyer</button>
            </form>
        </div>
    </div>

@endsection

@section('javascript')
    <script>
        $('.date-picker').datepicker({
            language: "fr"
        });
    </script>
@endsection
