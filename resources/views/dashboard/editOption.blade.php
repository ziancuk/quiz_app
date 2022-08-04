@extends('layouts.app')
@section('title', 'Edit Option')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Option</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Option</li>
                <li class="breadcrumb-item active">{{$option->option}}</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    Option adalah pilihan jawaban dari setiap pertanyaan dan masing-masing jawaban memiliki score.
                </div>
            </div>
            <form action="/option/{{$option->id}}/update" method="POST" enctype="multipart/form-data" class="ml-2 mr-2 mt-4 mb-4" style="margin: auto;">
                @method('patch')
                @csrf
                <div class="form-group row">
                    <label for="staticName" class="col-sm-3 col-form-label">Question</label>
                    <div class="col-sm-9">
                        <select class="custom-select" name="question_id" id="validationTooltip04" required>
                            @foreach($question as $q)
                            <option value="{{$q->id}}" {{ $q->id == $option->question->id ? 'selected' : '' }}>{{$q->question}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticName" class="col-sm-3 col-form-label">Option</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="option" name="option" value="{{old('option') ?? $option->option}}">
                        @error('option')
                        <div class="mt-1">
                            <small class="ml-1" style="color: red;">{{$message}}</small>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticName" class="col-sm-3 col-form-label">Score</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="score" name="score" value="{{old('score') ?? $option->score}}">
                        @error('score')
                        <div class="mt-1">
                            <small class="ml-1" style="color: red;">{{$message}}</small>
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-lg text-right p-0">
                    <inpit onclick="history.back()" type="button" class="btn btn-secondary">Batal</inpit>
                    <input type="submit" class="btn btn-primary" value="Edit"></input>
                </div>
            </form>
        </div>

        @endsection