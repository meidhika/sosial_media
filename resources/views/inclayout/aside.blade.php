<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-40 img-radius" src="{{ asset('storage/image/' . auth()->user()->profile_picture) }}"
                    alt="User-Profile-Image">
                <div class="user-details">
                    <span>{{ auth()->user()->name ?? '' }}</span>

                </div>
            </div>

            <div class="main-menu-content">

            </div>
        </div>
        <div class="pcoded-search">
            <span class="searchbar-toggle"> </span>
            <div class="pcoded-search-box ">
                <input type="text" placeholder="Search">
                <span class="search-icon"><i class="ti-search" aria-hidden="true"></i></span>
            </div>
        </div>

        <ul class="pcoded-item pcoded-left-item">
            <li class="active">
                <a href="{{ route('dashboard.index') }}">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Home</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('profile.index') }}">
                    <span class="pcoded-micon"><i class="ti-user"></i><b>P</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Profile</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

        </ul>






    </div>
</nav>
