@extends('layout.admin')

@section('content')

    @include('admin.common.breadcrumb', [
        'mainTitle' => 'Quizz',
        'links' => [
            'Quizz' => 'quizz.index',
            'Voir le quizz' => 'quizz.show'
        ]
    ])

    <div class="row">
        <div class="col-lg-12">
            @foreach($quizz->questions as $question)
                <h4>{{$question->label}}</h4>
                <ul class="list-group">
                    @foreach($question->answers as $key => $answer)
                        @if($answer->correct)
                            <li class="list-group-item list-group-item-success">{{$key+1}} {{$answer->label}}</li>
                        @else
                            <li class="list-group-item">{{$key+1}} {{$answer->label}}</li>
                        @endif
                    @endforeach
                </ul>
                <hr>
            @endforeach
        </div>
    </div>
@endsection

