<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title') - Quiz App</title>
    {{-- Styles --}}
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
</head>

<body class="sb-nav-fixed">

    @include('layouts.nav')
    @include('layouts.sidebar')
    @yield('content')

    <footer>
        @include('layouts.footer')
    </footer>

    {{-- Script --}}
    @include('includes.script')
    @stack('after-script')

</body>

</html>