@extends('layouts.app')
@section('title', 'Category')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Kategori</h1>
            <form action="/category/{{$category->id}}/update" method="POST" enctype="multipart/form-data" class="ml-2 mr-2 mt-4 mb-4" style="margin: auto;">
                @method('patch')
                @csrf
                <div class="form-group row">
                    <label for="staticName" class="col-sm-3 col-form-label">Nama Kategori</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="category_name" name="category_name" value="{{old('category_name') ?? $category->category_name}}">
                        @error('category_name')
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