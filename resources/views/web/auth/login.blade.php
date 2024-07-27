<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('/') }}otika/assets/css/app.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}otika/assets/bundles/bootstrap-social/bootstrap-social.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}otika/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('/') }}otika/assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}otika/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset(' /') }}otika/assets/img/favicon.ico' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">

                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="text-center">
                            <h5 class="text-center">Sistem Informasi Ekstrakurikuler</h5>
                            <h5 class="text-center">SMAN 1 Baubau</h5>

                        </div><br>
                        <div class="card card-primary">
                            <div class="card-header">

                            </div>
                            <div class="card-body">
                                <div class="text-center" style="margin:0px auto;">
                                    <img width="150" src="{{ asset('/logo.png') }}" alt="">
                                </div>
                                <p class="text-center">Silahkan login</p>
                                <form id="formAuthentication" class="mb-3" action="{{ route('proses.login') }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            tabindex="1" required autofocus>
                                        @error('email')
                                            <span style="color:red;font-size:13px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            {{-- <div class="float-right">
                                                <a href="/lupa-password" class="text-small">
                                                    Lupa Password?
                                                </a>
                                            </div> --}}
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="2" required>
                                        @error('password')
                                            <span style="color:red;font-size:13px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        {{-- <div class="mt-5 text-muted text-center">
                            Belum punya akun? <a href="/daftar">Daftar</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('/') }}otika/assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="{{ asset('/') }}otika/assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('/') }}otika/assets/js/custom.js"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->

</html>
