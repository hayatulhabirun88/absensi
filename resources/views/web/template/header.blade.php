<nav class="navbar navbar-expand-lg main-navbar sticky">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                        collapse-btn">
                    <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                    <i data-feather="maximize"></i>
                </a>
            </li>

        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if (auth()->user()->foto)
                    <img alt="image"
                        src="{{ asset('/') }}{{ env('ASSET_UPLOAD') }}foto_user/{{ auth()->user()->foto }}"
                        class="user-img-radious-style">
                @else
                    <img alt="image" src="{{ asset('/') }}{{ env('ASSET_UPLOAD') }}fotouser.jpg"
                        class="user-img-radious-style">
                @endif


                <span class="d-sm-none d-lg-inline-block"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
                <div class="dropdown-title">Hello {{ auth()->user()->name }}</div>
                <a href="profil" class="dropdown-item has-icon"> <i class="far
                    fa-user"></i>
                    Profile
                </a>
                <a href="/logout" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
