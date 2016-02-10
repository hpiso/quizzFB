@extends('layout.front')

@section('content')
        <h1 class="title">Quizz {{ $quizz->theme->label }}</h1><div id="compteRebour"></div>
        <div class="row liste_questions">
            <form method="GET" action={{url('result')}}>
                @foreach($tabQuest as $quest)
                    <div class="questions col s12 " id="{{$quest->id}}">
                        {{--Generate Questions--}}
                    </div>
                @endforeach
            </form>
                <div id="pagingControls"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    nextPage(0);
    $('.nav-wrapper .brand-logo').removeAttr('href');
</script>
@endsection