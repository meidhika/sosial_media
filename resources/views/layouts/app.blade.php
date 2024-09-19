<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Social Media</title>

    @include('inclayout.css')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img class="img-fluid" src="{{ asset('img/LogoWeb.png') }}" alt="Theme-Logo" width="35px" />
                My Social Media
            </a>

            <!-- Form Pencarian -->
            <form class="d-flex ms-auto" role="search" action="{{ route('search') }}" method="GET">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
                <button class="btn btn-success" type="submit">Search</button>
            </form>

            <!-- Tombol Logout -->
            <div class="d-flex">
                <form action="{{ route('logout') }}" method="POST" class="ms-3">
                    @csrf
                    <button class="btn btn-danger" type="submit"><i class="ti-layout-sidebar-left"></i> Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="sidebar bg-primary">
        <div class="text-center mb-4">
            <img src="{{ asset('storage/image/' . auth()->user()->foto_profile) }}" class="rounded" alt="User Profile"
                width="50px">
            <h5 class="mt-2">{{ auth()->user()->nama ?? '' }}</h5>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.index') }}">
                    <i class="bi bi-house-door-fill"></i> Beranda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.index') }}">
                    <i class="bi bi-person-fill"></i> Profile
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <h3>
                @yield('title')

            </h3>
            <div class="card">
                <div class="card-body">
                    @include('sweetalert::alert')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>




    @include('inclayout.js')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
</body>

</html>
