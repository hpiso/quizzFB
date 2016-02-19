@extends('layout.admin')

@section('content')

    @include('admin.common.breadcrumb', [
        'mainTitle' => 'Question',
        'links' => [
            'Question' => 'question.index',
            'Créer une question' => 'question.create'
        ]
    ])

    <div class="row">
        <div class="col-lg-6">
            <form method="post" action="{{ route('question.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="quizz">Associer à un quizz</label>
                    <select class="form-control selectpicker" multiple data-max-options="3" id="quizz" name="quizz[]">
                        @foreach($items as $item)
                            <option value="{{$item->id}}">{{$item->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="questionLabel">Posez votre question (cocher la bonne réponse)</label>
                    <input type="text" class="form-control" required id="questionLabel" name="label" placeholder="Votre question ?">
                </div>
                <div id="answers">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="radio" class="checkboxAnswer" value="1" name="answerChecked" checked id="checkboxAnswer1">
                            </span>
                            <input type="text" class="form-control" required name="answerLabel[1]" placeholder="Réponse n°1">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="radio" class="checkboxAnswer" value="2" name="answerChecked" id="checkboxAnswer2">
                            </span>
                            <input type="text" class="form-control" required name="answerLabel[2]" placeholder="Réponse n°2">
                        </div>
                    </div>
                    <div class="answers2">
                        <div class="form-group">
                            <a href="#" class="answerNbr" data-answernbr="2">Ajouter une réponse</a>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-default">Créer</button>
            </form>
        </div>
    </div>

@endsection

@section('javascript')
    <script>
        var element = '#answers';

        //Adding answers form
        $(element).on('click', '.answerNbr', function() {
            var answerNbr = $(this).data('answernbr');
            answerNbr += 1;
            var data = '';

            data += '<div class="form-group">'
                 +  '<div class="input-group">'
                 +  '<span class="input-group-addon">'
                 +  '<input type="radio" class="checkboxAnswer" value="'+ answerNbr +'" name="answerChecked" id="checkboxAnswer'+ answerNbr +'">'
                 +  '</span>'
                 +  '<input type="text" class="form-control" required name="answerLabel['+ answerNbr +']" placeholder="Réponse n°'+ answerNbr +'">'
                 +  '</div>'
                 +  '</div>'
                 +  '<div class="answers'+ answerNbr +'">'
                 +  '<div class="form-group">'
                 +  '<a href="#" class="answerNbr" data-answernbr="'+ answerNbr +'">Ajouter une réponse</a>'
                 +  '</div>'
                 +  '</div>';

            var answerNbrClass = $(this).data('answernbr');
            $( ".answers"+answerNbrClass).html(data);
        });
    </script>
    <script>
        $('.selectpicker').selectpicker({
            "noneSelectedText": 'Aucun quizz sélectionné'
        });
    </script>
@endsection