@extends('layouts.app')
@section('title', 'Category')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Question</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Question</li>
                <li class="breadcrumb-item active">{{$question->question}}</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    Question adalah pertanyaan-pertanyaan yang akan ditambahkan sesuai dengan kategorinya.
                </div>
            </div>
            <form action="/question/{{$question->id}}/update" method="POST" enctype="multipart/form-data" class="ml-2 mr-2 mt-4 mb-4" style="margin: auto;">
                @method('patch')
                @csrf
                <div class="form-group row">
                    <label for="staticName" class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-sm-9">
                        <select class="custom-select" name="category_id" id="validationTooltip04" required>
                            @foreach($category as $c)
                            <option value="{{$c->id}}" {{ $c->id == $question->category->id ? 'selected' : '' }}>{{$c->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticName" class="col-sm-3 col-form-label">Question</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="question" name="question" value="{{old('question') ?? $question->question}}">
                        @error('question')
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