<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Sys Pakar</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="{{ asset('frontend/vendors/owl-carousel/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendors/owl-carousel/css/owl.theme.default.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendors/mdi/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendors/aos/css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.min.css') }}" />
    @yield('styles')
</head>

<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
    <header id="header-section">
        @include('components.nav')
    </header>
    <div class="content-wrapper">
        <div class="container">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('frontend/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/aos/js/aos.js') }}"></script>
    <script src="{{ asset('frontend/js/landingpage.js') }}"></script>
</body>

</html>
