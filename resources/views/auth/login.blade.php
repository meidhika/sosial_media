<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login Social Media </title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('pendaftaran/css/style.css') }}">

    <!-- Boxicons CSS -->
    <link rel="shortcut icon" href="{{ asset('img/LogoWeb.png') }}" type="image/x-icon">

</head>

<body>
    <section class="container forms">
        @include('sweetalert::alert')
        <div class="form login">
            <div class="form-content">
                <header>Login</header>
                <form action="{{ route('login.submit') }}" method="post">
                    @csrf
                    <div class="field input-field">
                        <input type="email" placeholder="Email" class="input" name="email">
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Password" class="password" name="password">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="field button-field">
                        <button type="submit">Login</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Belum Punya Akun ? <a href="{{ route('register') }}" class="link signup-link">
                            Daftar</a></span>
                </div>
            </div>



        </div>

        <!-- Signup Form -->

        <div class="form signup">
            <div class="form-content">
                <header>Signup</header>
                <form method="POST" action="{{ route('register.submit') }}">
                    @csrf
                    <div class="field input-field">
                        <input type="text" placeholder="Nama Anda" class="input" name="nama">
                    </div>
                    <div class="field input-field">
                        <input type="email" placeholder="Email Anda" class="input" name="email">
                    </div>
                    <div class="field input-field">
                        <input type="password" placeholder="Buat Password" class="password" name="password">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="field button-field">
                        <button type="submit">Signup</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Sudah Punya Akun? <a href="{{ route('login') }}" class="link login-link">Login</a></span>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <script src="{{ asset('pendaftaran/js/script.js') }}"></script>
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
</body>

</html>
