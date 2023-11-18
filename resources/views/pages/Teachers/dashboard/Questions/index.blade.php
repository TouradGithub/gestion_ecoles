@extends('layouts.master')
@section('css')
    @toastr_css
@endsection
@section('title')
    Liste des Questions
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Liste des Questions : <span class="text-danger">{{$quizz->name}}</span>
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('questions.show',$quizz->id)}}" class="btn btn-success btn-sm" role="button" aria-pressed="true">Ajouter une Nouvelle Question</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Question</th>
                                            <th scope="col">Réponses</th>
                                            <th scope="col">Réponse Correcte</th>
                                            <th scope="col">Note</th>
                                            <th scope="col">Nom du Quiz</th>
                                            <th scope="col">Opérations</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($questions as $question)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$question->title}}</td>
                                                <td>{{$question->answers}}</td>
                                                <td>{{$question->right_answer}}</td>
                                                <td>{{$question->score}}</td>
                                                <td>{{$question->quizze->name}}</td>
                                                <td>
                                                    <a href="{{route('questions.edit',$question->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_exam{{ $question->id }}" title="Supprimer"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- Inclure le modal en dehors de la boucle -->
    @include('pages.Teachers.dashboard.Questions.destroy')

@endsection

@section('js')
    @toastr_js
    @toastr_render
@endsection
