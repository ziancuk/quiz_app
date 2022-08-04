<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Welcome - Quiz</title>
    {{-- Styles --}}
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
</head>

<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Quiz App</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </d>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">My Account</a></li>
                        <li><a class="dropdown-item" href="#!">Change Password</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="row">
                        <div class="card p-2 bg-dark">
                            <div class="card-body text-center text-white">
                                <div class="row">
                                    <h1>{{(Auth::user()->name)}}</h1>
                                    <hr>
                                    <p>Kamis, 4 Agustus 2022</p>
                                    <hr>
                                    <p>"Jika sudah masuk kuis, waktu akan berjalan otomatis dan tidak dapat diulang.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid p-4">
                    <div class="row">
                        <div class="container">
                            <div class="card p-4">
                                <div class="row p-2">
                                    <h2 class="p-0">Kuis yang dapat diikuti</h2>
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Jenis Kuis</th>
                                                <th scope="col">Total Pertanyaan</th>
                                                <th scope="col">Status Kuis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($category as $c)
                                            <tr>
                                                <td>{{$c->category_name}}</td>
                                                <td>{{$c->question->count()}}</td>
                                                <td><a href="/kuis/{{$c->id}}" class="btn btn-primary btn-sm" style="background-color:#2962FF;">
                                                        Mulai Kuis</i>
                                                    </a></td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6" class="text-center p-5" style="font-size: 18px;">
                                                    Belum Ada Kuis
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <footer>
                @include('quiz.layouts.footer')
            </footer>

            {{-- Script --}}
            @include('includes.script')
            @stack('after-script')
            <script>
                fetch('/api/v1/kuis')
                    .then(response => response.json())
                    .then(response => {
                        const table = response;
                        console.log(table);
                        let column = '';
                        table.forEach(m => column += showRow(m));

                        const tableContainer = document.querySelector('.tableContainer');
                        tableContainer.innerHTML = column;
                    });

                function showRow(m) {
                    return `<tr>
                                <td>${m.category_name}</td>
                                <td>10</td>
                                <td><a href="/kuis/${m.id}" class="btn btn-primary btn-sm" style="background-color:#2962FF;">
                                        Mulai Kuis</i>
                                    </a></td>
                                </tr>`
                }
            </script>

</body>

</html>