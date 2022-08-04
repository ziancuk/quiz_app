<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - Quiz App</title>

    {{-- Styles --}}
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')

</head>

<body class="bg-primary">
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-3 ">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg text-white">
                            <i class="fas fa-parking fa-4x"></i>
                            <br>
                            <strong style="font-size: 25px;">Quiz App</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--7 pb-4">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-white border-0 mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <h3 class="text-muted">Login</h3>
                            </div>
                            @if (session('error'))
                            <div class="alert alert-danger mt-3">
                                {{ session('error') }}
                            </div>
                            @endif
                            @if (session('status'))
                            <div class="alert alert-success mt-3">
                                {{ session('status') }}
                            </div>
                            @endif
                            <form action="/login" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input class="form-control ml-2" placeholder="Email" type="text" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input class="form-control ml-2" placeholder="Password" type="password" name="password">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg text-left">
                                        <small> Belum Punya akun? <a href="/register" class="text-primary">Daftar Disini</a></small>
                                    </div>
                                </div>
                                <div class="text-center form-group mt-2">
                                    <button type="submit" class="btn btn-primary my-2">Masuk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-2">
        <div class=" container">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl">
                    <div class="copyright text-center text-muted">
                        &copy; 2022 by <a href="https://www.instagram.com/fauzian.muhamad/" class="font-weight-bold ml-1" target="_blank">Fauzian Sebastian</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    {{-- Script --}}
    @include('includes.script')
    @stack('after-script')
    <script>
        const myForm = document.getElementById('formRegis');
        myForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(formRegis);

            fetch('api/v1/user', {
                method: 'post',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'url': 'api/v1/user',
                    "X-CSRF-Token": document.querySelector('input[name=_token]').value,
                },
                body: formData
            }).then(function(response) {
                return response.text();
            }).then(function(text) {
                console.log(text)
            }).catch(function(error) {
                console.error(error)
            })
        })
    </script>
</body>

</html>