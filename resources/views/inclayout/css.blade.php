{{-- <!-- Required Fremwork -->
<link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/bootstrap/css/bootstrap.min.css') }}">
<!-- themify-icons line icon -->
<link rel="stylesheet" type="text/css" href="{{ asset('home/assets/icon/themify-icons/themify-icons.css') }}">
<!-- ico font -->
<link rel="stylesheet" type="text/css" href="{{ asset('home/assets/icon/icofont/css/icofont.css') }}">
<!-- Style.css -->
<link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('home/assets/css/jquery.mCustomScrollbar.css') }}">
<link rel="shortcut icon" href="{{ asset('img/LogoWeb.png') }}" type="image/x-icon"> --}}
<link rel="shortcut icon" href="{{ asset('img/LogoWeb.png') }}" type="image/x-icon">
<link rel="stylesheet" href="{{ asset('layout/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
    }

    .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        background-color: #007bff;
        /* Warna biru */
        color: white;
    }

    .navbar .navbar-brand,
    .navbar .btn {
        color: white;
    }

    .sidebar {
        position: fixed;
        top: 56px;
        /* Sesuaikan dengan tinggi navbar */
        left: 0;
        width: 250px;
        height: calc(100% - 56px);
        background-color: #007bff;
        /* Warna biru */
        padding: 15px;
        color: white;
    }

    .sidebar .nav-link {
        background-color: white;
        color: #007bff;
        margin-bottom: 10px;
        border-radius: 5px;
        padding: 10px;
    }

    .sidebar .nav-link .bi {
        margin-right: 10px;
    }

    .main-content {
        margin-top: 56px;
        /* Sesuaikan dengan tinggi navbar */
        margin-left: 250px;
        /* Sesuaikan dengan lebar sidebar */
        padding: 20px;
        background-color: #e9ecef;
        height: 100%;
    }

    .card {
        background-color: white;
    }
</style>
