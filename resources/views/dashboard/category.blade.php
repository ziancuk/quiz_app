@extends('layouts.app')
@section('title', 'Category')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Kategori</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Kategori</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    Kategori adalah jenis kuis yang akan menentukan pertanyaan-pertanyaan yang dibuat sesuai dengan kategori itu sendiri.

                </div>
            </div>
            <div class="col-lg p-0 mb-4 text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kategoriModal">Tambah Kategori <i class="fas fa-plus"></i></button>
            </div>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{$error}} <br>
                @endforeach
            </div>
            @endif
            @if (session('status'))
            <div class="alert alert-success mt-3">
                {{ session('status') }}
            </div>
            @endif
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="name" style="font-size:15px">No</th>
                            <th scope="col" class="sort" data-sort="name" style="font-size:15px">Nama Kategori</th>
                            <th scope="col" class="sort" data-sort="name" style="font-size:15px">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @forelse($category as $c)
                        <tr>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">{{$loop->iteration}}</span>
                                    </div>
                                </div>
                            </th>
                            <td>
                                <span class="name mb-0 text-sm">
                                    <span class="status">{{$c->category_name}}</span>
                                </span>
                            </td>
                            <td>
                                <form action="/delete/{{$c->id}}/category" method="POST">
                                    @csrf
                                    @method("delete")
                                    <a href="/edit/{{$c->id}}/category" class="btn btn-primary btn-sm" style="background-color:#2962FF;">
                                        <i class="fas fa-edit" style="color: white;"></i>
                                    </a>
                                    <button type="submit" onclick="return confirm('Anda yakin ingin menghapusnya?')" class="btn btn-danger btn-sm delete-campaign"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center p-5" style="font-size: 18px;">
                                Belum Ada Kategori
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ADD Kategori -->
        <div class="modal fade" id="kategoriModal" tabindex="-1" aria-labelledby="kategoriModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="kategoriModal">Tambah Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/add/category" method="POST" enctype="multipart/form-data" class="ml-2 mr-2" style="margin: auto;">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" id="category_name" placeholder="Nama Kategori" name="category_name">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <input type="submit" class="btn btn-primary" value="Tambah Kategori"></input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection