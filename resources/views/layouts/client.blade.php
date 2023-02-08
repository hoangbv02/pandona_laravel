<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('frontend/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/sweetalert2/sweetalert2.min.css') }}">
</head>

<body>
    <div class="container-fluid p-0">
        @include('clients.blocks.header')
        @include('clients.blocks.navbar')
        @if (request()->path() != '/')
            @include('clients.blocks.breadcrumb')
        @endif
        <div class="container">
            @yield('content')
        </div>
        @include('clients.blocks.footer')
    </div>
    <a class="btn-top" href="#"><i class="fa-solid fa-arrow-up"></i></a>
    <script src="{{ asset('frontend/sweetalert2/sweetalert2.all.min.js') }}"></script>
    @yield('js')
    @yield('script')
    <script src="{{ asset('frontend/jquery/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('frontend/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>
