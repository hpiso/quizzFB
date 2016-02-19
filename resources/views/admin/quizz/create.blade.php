@extends('layout.admin')

@section('content')

    @include('admin.common.breadcrumb', [
        'mainTitle' => 'Quizz',
        'links' => [
            'Quizz' => 'quizz.index',
            'Ajouter un quizz' => 'quizz.create'
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
            <form method="post" action="{{ route('quizz.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="quizzLabel">Nom</label>
                    <input type="text" class="form-control" id="quizzLabel" name="label" placeholder="Nom du thème">
                </div>
                <div class="form-group">
                    <label for="quizzDescription">Description</label>
                    <textarea class="form-control" id="quizzDescription" name="description" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <label for="quizzMaxNumber">Nombre de question</label>
                    <input type="number" class="form-control" id="quizzMaxNumber" name="max_question">
                </div>
                <div class="form-group">
                    <label for="quizzStartDate">Date de début</label>
                    <input type="text" class="form-control date-picker"  id="quizzStartDate" name="starting_at">
                </div>
                <div class="form-group">
                    <label for="quizzEndDate">Date de fin</label>
                    <input type="text" class="form-control date-picker"  id="quizzEndDate" name="ending_at">
                </div>
                <div class="form-group">
                    <label for="quizzTheme">Thème</label>
                    <select class="form-control" id="quizzTheme" name="id_theme">
                        @foreach($items as $item)
                            <option value="{{$item->id}}">{{$item->label}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
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
