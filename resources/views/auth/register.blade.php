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
        <div class="container mt--7 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="card bg-white border-0 mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <h4 class="text-muted">Registrasi User</h4>
                            </div>
                            @if (session('status'))
                            <div class="alert alert-danger mt-3">
                                {{ session('status') }}
                            </div>
                            @endif
                            <form action="/register" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input class="ml-2 form-control" placeholder=" Nama Lengkap" type="text" name="name" value="{{old('name')}}">
                                    </div>
                                    @error('name')
                                    <div class="mt-1">
                                        <small class="ml-1" style="color: red;">{{$message}}</small>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input class="ml-2 form-control" placeholder=" Email" type="email" name="email" value="{{old('email')}}">
                                    </div>
                                    @error('email')
                                    <div class="mt-1">
                                        <small class="ml-1" style="color: red;">{{$message}}</small>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input class="ml-2 form-control" placeholder=" Password" type="password" name="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input class="ml-2 form-control" placeholder=" Confirm Password" type="password" name="password_confirmation">
                                    </div>
                                    @error('password')
                                    <div class="mt-1">
                                        <small class="ml-1" style="color: red;">{{$message}}</small>
                                    </div>
                                    @enderror
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg text-left">
                                        <a href="/" class="text-primary"><small>Sudah punya akun? Klik disini</small></a>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-2">Register</button>
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
        <div class="container">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl">
                    <div class="copyright text-center text-white">
                        &copy; 2022 by <a href="https://www.instagram.com/fauzian.muhamad/" class="font-weight-bold ml-1 nav-item" style="text-decoration:none !important; color: white;" target="_blank">Fauzian Sebastian</a>
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