<style>
    .navbar {
        background-color: transparent;
        padding: 20px 0;
    }

    .navbar-brand img {
        height: 40px;
    }

    .contact-btn {
        background-color: #FF7F50;
        color: white !important;
        border-radius: 25px;
        padding: 8px 25px;
    }

    .contact-btn:hover {
        background-color: #ffff;
        border: #FF7F50 1px solid;
        color: #FF7F50 !important;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            {{-- <img src="msd-logo.png" alt="MSD Logo"> --}}
            MSD
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homepage') }}">@lang('messages.btn_home')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aboutus.view') }}">@lang('messages.btn_aboutUs')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('service.view') }}">@lang('messages.btn_services')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pricing.view') }}">@lang('messages.btn_vaccine')</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @lang('messages.btn_language')
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('set-locale', 'id')}}">Indonesian</a></li>
                        <li><a class="dropdown-item" href="{{route('set-locale', 'en')}}">English</a></li>
                        <li><a class="dropdown-item" href="{{route('set-locale', 'jp')}}">Japanese</a></li>
                    </ul>
                </li>
            </ul>

            <div class="d-flex align-items-center">
                <a class="btn contact-btn text-white me-3" href="{{ route('profile') }}">@lang('messages.btn_profile')</a>
                <a href="#" class="d-flex align-items-center">
                    <i class="fas fa-user-circle fa-lg"></i>
                </a>
            </div>
            <div class="d-flex align-items-center">
                <a class="btn contact-btn text-white me-3" href="{{ route('logout') }}">@lang('messages.btn_logout')</a>
                <i class="fas fa-user-circle fa-lg"></i>
                </a>
            </div>
        </div>
    </div>
</nav>