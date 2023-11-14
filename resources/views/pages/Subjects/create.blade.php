@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Ajouter une matière
@stop
@endsection
@section('page-header')
    <!-- fil d'ariane -->
@section('PageTitle')
    Ajouter une matière
@stop
<!-- fil d'ariane -->
@endsection
@section('content')
    <!-- ligne -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{ route('subjects.store') }}" method="post" autocomplete="off">
                                @csrf

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">Nom de la matière en arabe</label>
                                        <input type="text" name="Name_ar" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="title">Nom de la matière en anglais</label>
                                        <input type="text" name="Name_en" class="form-control">
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="inputState">Niveau scolaire</label>
                                        <select class="custom-select my-1 mr-sm-2" name="Grade_id">
                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                            @foreach($grades as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col">
                                        <label for="inputState">Classe</label>
                                        <select name="Class_id" class="custom-select"></select>
                                    </div>

                                    <div class="form-group col">
                                        <label for="inputState">Nom de l'enseignant</label>
                                        <select class="custom-select my-1 mr-sm-2" name="teacher_id">
                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                            @foreach($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Enregistrer les données</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ligne fermée -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    <script>
        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Class_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('Le chargement AJAX n\'a pas fonctionné');
                }
            });
        });
    </script>
@endsection
