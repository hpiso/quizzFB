@extends('layout.front')

@section('content')
<div class="row">
    <div class="col s12">
        <a href="{{ route('front.question') }}" class="waves-effect waves-light btn">Commencer le quizz</a>
    </div>
</div>
@endsection