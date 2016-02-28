@extends('layout.admin')

@section('content')

    @include('admin.common.breadcrumb', [
        'mainTitle' => 'Thème',
        'icon' => 'fa-picture-o',
        'links' => [
            'Thème' => 'theme.index',
            'Ajouter un thème' => 'theme.create'
        ]
    ])

    <div class="row">
        <div class="col-lg-4">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('theme.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="themeLabel">Nom</label>
                    <input type="text" class="form-control" id="themeLabel" name="label" placeholder="Nom du thème">
                </div>
                <div class="form-group">
                    <label for="themeDescription">Description</label>
                    <textarea class="form-control" id="themeDescription" name="description" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <label for="themeColorNav">Couleur du header</label>
                    <div class="input-group color-picker">
                        <input type="text" id="themeColorNav" name="color_nav" value="#3853a5" class="form-control" />
                        <span class="input-group-addon"><i></i></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="themeColorElements">Couleur des éléments</label>
                    <div class="input-group color-picker">
                        <input type="text" id="themeColorElements" name="color_elements" value="#c35050" class="form-control" />
                        <span class="input-group-addon"><i></i></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>

@endsection

@section('javascript')
    <script>
        $(function(){
            $('.color-picker').colorpicker();
        });
    </script>
@endsection




