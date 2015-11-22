@extends('layout.admin')

@section('content')

    @include('admin.common.breadcrumb', [
        'mainTitle' => 'Thème',
        'links' => [
            'Thème' => 'theme.index',
            'Modifier un thème' => 'theme.edit'
        ]
    ])

    <div class="row">
        <div class="col-lg-12">
            <form method="update" action="{{ route('theme.update', ['id' => $theme->id]) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="themeLabel">Nom du thème</label>
                    <input type="text" class="form-control" id="themeLabel" name="label" value="{{ $theme->label }}" placeholder="Nom du thème">
                </div>
                <div class="form-group">
                    <label for="themeDescription">Password</label>
                    <textarea class="form-control" id="themeDescription" name="description" placeholder="Description">{{ $theme->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>

@endsection

