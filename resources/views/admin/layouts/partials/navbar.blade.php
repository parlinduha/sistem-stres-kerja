<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{ route('admin.dashboard.index') }}">
            <img src="{{ asset('First Media.svg') }}" width="100" height="20" alt="" srcset="" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard.index') }}">
            <img src="{{ asset('First Media.svg') }}" width="100" height="20" alt="" srcset="" />
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <ul class="navbar-nav navbar-nav-right">
                @auth

                    @if (Route::has('login'))
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                                <span>{{ Auth::user()->name }} | </span>
                                <!-- Di sini kamu bisa menampilkan gambar profil pengguna -->
                                @if (Auth::user()->image)
                                    <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="profile"
                                        style="border: 1px #3b44a8 solid;" />
                                @else
                                    <img src="{{ asset('backend/images/faces/face28.jpg') }}" alt="profile"
                                        style="border: 1px #3b44a8 solid;">
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="{{ route('admin.profile.index') }}">
                                    <i class="ti-settings text-primary"></i>
                                    Settings
                                </a>
                                <!-- Tambahkan fungsi logout dengan menggunakan form -->
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf <!-- Atur CSRF token untuk melindungi aplikasi dari serangan CSRF -->
                                    <button type="submit" class="dropdown-item">
                                        <i class="ti-power-off text-primary"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endif
                @else
                    <script>
                        window.location.href = "{{ route('login') }}";
                    </script>
                @endauth
            </ul>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>
