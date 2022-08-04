@extends('layouts.app')
@section('title', 'Option')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Option</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Option</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    Option adalah pilihan jawaban dari setiap pertanyaan dan masing-masing jawaban memiliki score.
                </div>
            </div>
            <div class="col-lg p-0 mb-4 text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kategoriModal">Tambah Option <i class="fas fa-plus"></i></button>
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
                            <th scope="col" class="sort" data-sort="name" style="font-size:15px">Question</th>
                            <th scope="col" class="sort" data-sort="name" style="font-size:15px">Option</th>
                            <th scope="col" class="sort" data-sort="name" style="font-size:15px">Score</th>
                            <th scope="col" class="sort" data-sort="name" style="font-size:15px">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @forelse($option as $o)
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
                                    <span class="status">{{$o->question->question}}</span>
                                </span>
                            </td>
                            <td>
                                <span class="name mb-0 text-sm">
                                    <span class="status">{{$o->option}}</span>
                                </span>
                            </td>
                            <td>
                                <span class="name mb-0 text-sm">
                                    <span class="status">{{$o->score}}</span>
                                </span>
                            </td>
                            <td>
                                <form action="/delete/{{$o->id}}/option" method="POST">
                                    @csrf
                                    @method("delete")
                                    <a href="/edit/{{$o->id}}/option" class="btn btn-primary btn-sm" style="background-color:#2962FF;">
                                        <i class="fas fa-edit" style="color: white;"></i>
                                    </a>
                                    <button type="submit" onclick="return confirm('Anda yakin ingin menghapusnya?')" class="btn btn-danger btn-sm delete-campaign"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center p-5" style="font-size: 18px;">
                                Belum Ada Option
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ADD Option -->
        <div class="modal fade" id="kategoriModal" tabindex="-1" aria-labelledby="kategoriModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="kategoriModal">Tambah Question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/add/option" method="POST" enctype="multipart/form-data" class="ml-2 mr-2" style="margin: auto;">
                            @csrf
                            <div class="form-group">
                                <div class="col-sm-12 p-0">
                                    <select class="custom-select" name="question_id" id="validationTooltip04" required>
                                        <option value="">Pilih Pertanyaan</option>
                                        @forelse($question as $q)
                                        <option value="{{$q->id}}">{{$q->question}}</option>
                                        @empty
                                        <option value="">Question masih kosong</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="option" placeholder="Option" name="option">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="score" placeholder="Score" name="score">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <input type="submit" class="btn btn-primary" value="Tambah Option"></input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection