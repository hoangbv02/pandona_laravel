    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="{{ asset('frontend/img/logo.png') }}" type="image/x-icon">
        <title>Admin</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
            rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="{{ asset('frontend/fontawesome/css/all.min.css') }}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('frontend/bootstrap/css/admin_bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('frontend/css/admin.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('frontend/sweetalert2/sweetalert2.min.css') }}">
    </head>

    <body>
        <div class="container-fluid position-relative d-flex p-0">
            <!-- Spinner Start -->
            <div id="spinner"
                class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <!-- Spinner End -->
            @include ('admin.blocks.sidebar')
            <!-- Content Start -->
            <div class="content">
                @include ('admin.blocks.navbar')
                @yield('content')
            </div>
            <!-- Content End -->


            <!-- Back to Top -->
            <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button"><i
                    class="fas fa-chevron-up"></i></a>
        </div>
        <!-- JavaScript Libraries -->
        <script src="{{ asset('frontend/sweetalert2/sweetalert2.all.min.js') }}"></script>
        @if (session('message'))
            <script>
                Swal.fire({
                    position: 'center',
                    icon: '{{ is_array(session('message')) ? session('message')[0] : 'success' }}',
                    title: '{{ is_array(session('message')) ? session('message')[1] : session('message') }}',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
        @endif
        <script src="{{ asset('frontend/jquery/jquery-3.6.1.min.js') }}"></script>
        <script src="{{ asset('frontend/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('frontend/js/admin.js') }}"></script>
    </body>

    </html>
