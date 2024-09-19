<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">

        <div class="navbar-logo justify-content-center">

            <a href="index.html">
                <img class="img-fluid" src="{{ asset('img/LogoWeb.png') }}" alt="Theme-Logo" width="50px" />
                <p>My Social Media</p>
            </a>
        </div>

        <div class="navbar-container container-fluid">

            <ul class="nav-right mt-2">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit"><i class="ti-layout-sidebar-left"></i>Logout</button>

                </form>
                {{-- <li class="user-profile header-notification">
                    <a href="#!">
                        <img src="assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                        <span>John Doe</span>
                        <i class="ti-angle-down"></i>
                    </a>
                    <ul class="show-notification profile-notification">

                    </ul>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
