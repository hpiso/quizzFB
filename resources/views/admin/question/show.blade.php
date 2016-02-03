@extends('layout.admin')

@section('content')

    @include('admin.common.breadcrumb', [
        'mainTitle' => 'Question',
        'links' => [
            'Question' => 'question.index',
            'Détail question' => 'question.show'
        ]
    ])

    <div class="row">
        <div class="col-lg-4">
            <h4>{{$question->label}}</h4>
            @foreach($question->answers as $key => $answer)
                <ul class="list-group">
                @if($answer->correct)
                    <li class="list-group-item list-group-item-success">{{$key+1}} {{$answer->label}}</li>
                @else
                    <li class="list-group-item">{{$key+1}} {{$answer->label}}</li>
                @endif
                </ul>
            @endforeach
        </div>
    </div>

@endsection
