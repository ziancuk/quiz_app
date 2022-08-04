@extends('layouts.app')
@section('title', 'Result')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Result</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Result</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    Result adalah rekapan hasil jawaban yang diisi oleh user dan dapat dilihat score nya.
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="name" style="font-size:15px">No</th>
                            <th scope="col" class="sort" data-sort="name" style="font-size:15px">User</th>
                            <th scope="col" class="sort" data-sort="name" style="font-size:15px">Kategori</th>
                            <th scope="col" class="sort" data-sort="name" style="font-size:15px">Score</th>
                            <th scope="col" class="sort" data-sort="name" style="font-size:15px">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <!-- forelse($pelanggaran as $p) -->
                        <tr>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">$loop->iteration}}</span>
                                    </div>
                                </div>
                            </th>
                            <td>
                                <span class="name mb-0 text-sm">
                                    <span class="status">$p->nama_pelanggaran}}</span>
                                </span>
                            </td>
                            <td>
                                <span class="name mb-0 text-sm">
                                    <span class="status">$p->nama_pelanggaran}}</span>
                                </span>
                            </td>
                            <td>
                                <span class="name mb-0 text-sm">
                                    <span class="status">$p->nama_pelanggaran}}</span>
                                </span>
                            </td>
                            <td>
                                <form action="/delete/$p->fault_id}}/fault" method="POST">
                                    @csrf
                                    @method("delete")
                                    <a href="/edit/$p->fault_id}}/fault" class="btn btn-primary btn-sm" style="background-color:#2962FF;">
                                        <i class="fas fa-edit" style="color: white;"></i>
                                    </a>
                                    <button type="submit" onclick="return confirm('Anda yakin ingin menghapusnya?')" class="btn btn-danger btn-sm delete-campaign"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <!-- empty -->
                        <!-- <tr>
                                    <td colspan="6" class="text-center p-5" style="font-size: 18px;">
                                        Belum Ada Pelanggaran
                                    </td>
                                </tr>
                                endforelse -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ADD Kategori -->
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
                        <form action="/add/fault" method="POST" enctype="multipart/form-data" class="ml-2 mr-2" style="margin: auto;">
                            @csrf

                            <div class="form-group">
                                <div class="col-sm-12 p-0">
                                    <select class="custom-select" name="role_pelanggaran" id="validationTooltip04" required>
                                        <!-- forelse($penalti as $a) -->
                                        <option value="$a->role_pelanggaran}}">a->nama_pelanggaran}}</option>
                                        <!-- empty -->
                                        <!-- <option value="">Jenis pelanggaran belum ditambahkan ke master</option> -->
                                        <!-- endforelse -->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="question" placeholder="Question" name="question">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_kategori" placeholder="Nama Kategori" name="nama_kategori">
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