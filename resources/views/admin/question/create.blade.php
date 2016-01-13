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
        <div class="col-lg-4">
            <form method="post" action="{{ route('question.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="questionLabel">Posez votre question</label>
                    <input type="text" class="form-control" required id="questionLabel" name="label" placeholder="Votre question ?">
                </div>
                <div id="answers">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="checkbox" class="checkboxAnswer" name="answerChecked[1]" checked id="checkboxAnswer1">
                            </span>
                            <input type="text" class="form-control" required name="answerLabel[1]" placeholder="Réponse n°1">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="checkbox" class="checkboxAnswer" name="answerChecked[2]" id="checkboxAnswer2">
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
                <button type="submit" class="btn btn-default">Submit</button>
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
                 +  '<input type="checkbox" class="checkboxAnswer" name="answerChecked['+ answerNbr +']" id="checkboxAnswer'+ answerNbr +'">'
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

        //Only one checkbox can be selected
        $(element).on('change', '.checkboxAnswer', function() {
            $('.checkboxAnswer').not(this).prop('checked', false);
        });
    </script>
@endsection