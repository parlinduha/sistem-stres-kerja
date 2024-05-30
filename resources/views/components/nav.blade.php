<nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
    <div class="container">
        <div class="navbar-brand-wrapper d-flex w-100">
            <h5>Sys Pakar</h5>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="mdi mdi-menu navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
            <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
                <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
                    <div class="navbar-collapse-logo">
                        <img src="images/Group2.svg" alt="" />
                    </div>
                    <button class="navbar-toggler close-button" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
                    </button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}">Home
                        <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog') }}">Edukasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('assessment') }}">Diagnosa</a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-expanded="false">
                                Wellcome, {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">Log
                                        Out</a>
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item
                                                btn-contact-us pl-4 pl-lg-0">
                            <a class="btn btn-info" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
