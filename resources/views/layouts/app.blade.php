<!DOCTYPE html>
<html lang='id'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>@yield('title', 'Temuin')</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
</head>
<body>
<nav class='navbar navbar-expand-lg bg-dark navbar-dark'>
    <div class='container'>
        <a class='navbar-brand' href='{{ url('/') }}'>Lost and Found</a>
        <div class='navbar-nav ms-auto'>
            <a class='nav-link' href='{{ url('/') }}'>Beranda</a>
            @auth
                <a class='nav-link' href='{{ url('/dashboard') }}'>Dashboard</a>
                <a class='nav-link' href='{{ url('/my-reports') }}'>Laporan Saya</a>
                <a class='nav-link' href='{{ url('/profile') }}'>{{ auth()->user()->name }}</a>
                <form method='POST' action='{{ url('/logout') }}' class='d-inline'>
                    @csrf
                    <button class='btn btn-link nav-link'>Logout</button>
                </form>
            @else
                <a class='nav-link' href='{{ url('/login') }}'>Login</a>
                <a class='nav-link' href='{{ url('/register') }}'>Daftar</a>
            @endauth
        </div>
    </div>
</nav>

<main class='container py-4'>
    @if (session('success'))
        <div class='alert alert-success'>{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class='alert alert-danger'>{{ session('error') }}</div>
    @endif
    @if ($errors->any())
        <div class='alert alert-danger'>
            <ul class='mb-0'>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</main>
</body>
</html>