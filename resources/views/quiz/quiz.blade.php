@extends('quiz.layouts.app')
@section('title', 'Soal')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid p-4">
            <div class="row">
                <div class="container">
                    <div class="card p-4">
                        <div class="row p-2">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr class="">
                                        <th scope="col" class="text-center">{{$category->category_name}}</th>
                                        <th scope="col" class="text-center">Sisa waktu</th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="row">
                                <div class="container">
                                    @foreach($question as $q)
                                    <form action="/submit/quiz" method="POST">
                                    <p class="mt-4">{{$loop->iteration}}. {{$q->question}}</p>
                                    @csrf
                                    @foreach($q->option as $o)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="option_id" id="option1" value="{{$o->id}}">
                                            <label class="form-check-label" for="option">
                                                {{$o->option}}
                                            </label>
                                        </div>
                                        @endforeach
                                        @endforeach
                                        <input type="submit" class="col-lg-2 btn btn-primary mt-3"></input>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    @endsection