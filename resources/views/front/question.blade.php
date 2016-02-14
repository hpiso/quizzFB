@extends('layout.front')

@section('content')
    <div class="row question">
        <div class="col s12">
            <form method="post" action="{{ route('quizz.action') }}">
                <h2>{{$question->label}}</h2>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @foreach($question->answers as $key => $answer)
                    <p>
                        <input name="answer" value="{{$answer->id}}" type="radio" id="{{$answer->id}}" />
                        <label for="{{$answer->id}}">{{$answer->label}}</label>
                    </p>
                @endforeach()
                @if (session('status'))
                    <p>{{session('status')}}</p>
                @endif
                <input class="btn" type="submit" value="Valider">
            </form>
        </div>
    </div>
@endsection