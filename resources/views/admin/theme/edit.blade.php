@extends('layout.admin')

@section('content')

    @include('admin.common.breadcrumb', [
        'mainTitle' => 'Thème',
        'icon' => 'fa-picture-o',
        'links' => [
            'Thème' => 'theme.index',
            'Modifier un thème' => 'theme.edit'
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
            <form method="update" action="{{ route('theme.update', ['id' => $theme->id]) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="themeLabel">Nom</label>
                    <input type="text" class="form-control" id="themeLabel" name="label" value="{{ $theme->label }}" placeholder="Nom du thème">
                </div>
                <div class="form-group">
                    <label for="themeDescription">Description</label>
                    <textarea class="form-control" id="themeDescription" name="description" placeholder="Description">{{ $theme->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="themeColorNav">Couleur du header</label>
                    <div class="input-group color-picker">
                        <input type="text" id="themeColorNav" name="color_nav" value="{{ $theme->color_nav }}" class="form-control" />
                        <span class="input-group-addon"><i></i></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="themeColorElements">Couleur des éléments</label>
                    <div class="input-group color-picker">
                        <input type="text" id="themeColorElements" name="color_elements" value="{{ $theme->color_elements }}" class="form-control" />
                        <span class="input-group-addon"><i></i></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="logoTheme">Url du logo</label>
                    <input type="text" class="form-control" value="{{ $theme->logo }}" id="logoTheme" name="logo" >
                </div>
                <button type="submit" class="btn btn-default">Envoyer</button>
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
