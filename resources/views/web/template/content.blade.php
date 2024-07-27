<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') | SIMESKUL</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('/') }}otika/assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}otika/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('/') }}otika/assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}otika/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('/') }}otika/assets/img/favicon.ico' />
    <link rel="stylesheet" href="{{ asset('/') }}otika/assets/bundles/izitoast/css/iziToast.min.css">
    @stack('style')
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('web.template.header')

            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="/">
                            <img alt="image" src="{{ asset('/') }}logo.png" class="header-logo" />
                            <span class="logo-name">Simeskul</span>
                        </a>
                    </div>
                    @include('web.template.sidebar')

                </aside>
            </div>
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div>
            @include('web.template.footer');
        </div>
    </div>
    <script src="{{ asset('/') }}otika/assets/bundles/izitoast/js/iziToast.min.js"></script>
    @if (session('success'))
        <script>
            $(document).ready(function() {

                iziToast.success({
                    title: 'Sukses!',
                    message: `{{ session('success') }}`,
                    position: 'topRight'
                });
            });
        </script>
    @elseif(session('error'))
        <script>
            $(document).ready(function() {
                iziToast.error({
                    title: 'error!',
                    message: `{{ session('error') }}`,
                    position: 'topRight'
                });
            });
        </script>
    @endif
    <!-- General JS Scripts -->
    <script src="{{ asset('/') }}otika/assets/js/app.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('/') }}otika/assets/js/page/index.js"></script>
    <!-- Template JS File -->
    <script src="{{ asset('/') }}otika/assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('/') }}otika/assets/js/custom.js"></script>

    @stack('script')

</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
