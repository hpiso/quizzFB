@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quizz</h1>
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Maximum de question</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                </tr>
                </thead>
                <tbody>
                @foreach($entities as $entity)
                    <tr>
                        <td>{{$entity->label}}</td>
                        <td>{{$entity->description}}</td>
                        <td>{{$entity->max_question}}</td>
                        <td>{{$entity->starting_at}}</td>
                        <td>{{$entity->ending_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.col-lg-12 -->
    </div>


@endsection

