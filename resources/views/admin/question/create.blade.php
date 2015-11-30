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
                <div class="form-group">
                    <label for="answerNbr">Nombre de réponse possible</label>
                    <select class="form-control answerNbr" id="answerNbr" name="answerNbr">
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div id="answers">
                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="checkboxAnswer" name="answerChecked1" checked id="checkboxAnswer1"> Activer comme réponse correcte
                        </label>
                        <input type="text" class="form-control" name="answerLabel1" placeholder="Réponse n°1">
                    </div>
                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="checkboxAnswer" name="answerChecked2" id="checkboxAnswer1"> Activer comme réponse correcte
                        </label>
                        <input type="text" class="form-control" name="answerLabel2" placeholder="Réponse n°2">
                    </div>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>



@endsection

@section('javascript')
    <script>

        //Adding answers form
        $( ".answerNbr" ).change(function() {
            var questionNbr = $( ".answerNbr" ).val();

            //Form question html builder
            var data = '';
            for(i=1;i<=questionNbr; i++){
                data += '<div class="form-group">'
                    + '<label class="checkbox-inline">';
                if(i<=1){
                    data += '<input type="checkbox" class="checkboxAnswer" checked name="answerChecked'+i+'" id="checkboxAnswer'+i+'"> Activer comme réponse correcte';
                }else{
                    data += '<input type="checkbox" class="checkboxAnswer" name="answerChecked'+i+'" id="checkboxAnswer'+i+'"> Activer comme réponse correcte';
                }
                data += '</label>'
                    + '<input type="text" class="form-control" required name="answerLabel'+i+'" placeholder="Réponse n°'+i+'">'
                    + '</div>';
            }

            //Insert html data in #answers
            $( "#answers" ).html(data);

        });


        //Only one checkbox can be selected
        $('#answers').on('change', '.checkboxAnswer', function() {
            $('.checkboxAnswer').not(this).prop('checked', false);
        });

    </script>
@endsection