@extends('layout.admin')

@section('content')

    @include('admin.common.breadcrumb', [
        'mainTitle' => 'Question',
        'links' => [
            'Question' => 'question.index',
            'Modifier une question' => 'question.edit'
        ]
    ])

    <div class="row">
        <div class="col-lg-4">
            <form method="update" action="{{ route('question.update', ['id' => $question->id]) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="quizz">Associer à un quizz</label>
                    <select class="form-control selectpicker" multiple data-max-options="3" id="quizz" name="quizz[2]">
                        @foreach($items as $item)
                            <option value="{{$item->id}}">{{$item->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="questionLabel">Posez votre question</label>
                    <input type="text" class="form-control" required id="questionLabel" value="{{$question->label}}" name="label" placeholder="Votre question ?">
                </div>
                <div id="answers">
                    @foreach($question->answers as $key => $answer)
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    @if($answer->correct)
                                        <input type="checkbox" checked class="checkboxAnswer" name="answerChecked[{{$key}}]" id="checkboxAnswer{{$key}}">
                                    @else
                                        <input type="checkbox" class="checkboxAnswer" name="answerChecked[{{$key}}]" id="checkboxAnswer{{$key}}">
                                    @endif
                                </span>
                                <input type="text" class="form-control" required name="answerLabel[{{$key}}]" value="{{$answer->label}}" placeholder="Réponse n°{{$key +=1}}">
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>

@endsection

@section('javascript')
    <script>
        var element = '#answers';

        //Only one checkbox can be selected
        $(element).on('change', '.checkboxAnswer', function() {
            $('.checkboxAnswer').not(this).prop('checked', false);
        });
    </script>
@endsection