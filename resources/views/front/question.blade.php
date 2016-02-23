@extends('layout.front')

@section('content')
    <div id="address-bar" class="address-bar"><?php echo 'Question '.($numQuest+1).' sur '.$nbQuest; ?></div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        @if($numQuest+1 == $nbQuest )
                            <a id="nav_btn"  onmouseover="this.style.background='{{$backgroundColor}}';" onmouseout="this.style.background='transparent'" >VALIDER</a>
                        @else
                            <a id="nav_btn" onmouseover="this.style.background='{{$backgroundColor}}';" onmouseout="this.style.background='transparent'" >SUIVANT <i class="fa fa-chevron-right "></i></a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <form method="post" id="quest-form" action="{{ route('quizz.action') }}">
                    <hr>
                    <h2 class="intro-text text-center"><strong>{{$question->label}}</strong></h2>
                    <hr>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div id="compteRebour"></div>
                    <div class="modal-body">
                        <div class="quiz col-lg-8 col-lg-offset-2" id="quiz" data-toggle="buttons">
                            @if (session('status'))
                                @include('admin.common.flash-message', ['type' => 'danger', 'message' => session('status')])
                            @endif
                            @foreach($question->answers->shuffle() as $rep )
                                <label class="element-animation1 btn btn-lg btn-primary btn-block" style="background-color:{{$btnColor}}">
                                    <span class="btn-label">
                                        <i class="glyphicon glyphicon-chevron-right"></i>
                                    </span>
                                    <input type="radio" name="answer" value="{{$rep->id}}">
                                    {{$rep->label}}
                                </label>
                            @endforeach
                         </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        clearTimeout(timeout);
        (function(){
            $('#nav_btn').on('click', function(ev) {
                ev.preventDefault();
                $("#quest-form").submit();
            });
        })();
    </script>
@endsection