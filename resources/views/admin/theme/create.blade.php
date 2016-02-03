@extends('layout.admin')

@section('content')

    @include('admin.common.breadcrumb', [
        'mainTitle' => 'Thème',
        'links' => [
            'Thème' => 'theme.index',
            'Ajouter un thème' => 'theme.create'
        ]
    ])

    <div class="row">
        <div class="col-lg-4">
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
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>

@endsection

