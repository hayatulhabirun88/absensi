<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
    <title>Login | Simeskul</title>
    <link rel="stylesheet" href="{{ asset('/') }}cryptex/cryptex/vendor/swiper/swiper.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}cryptex/cryptex/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/') }}otika/assets/bundles/izitoast/css/iziToast.min.css">
</head>

<body>

    <div class="page page--login" data-page="login">

        <!-- HEADER -->
        {{-- <header class="header header--fixed">
            <div class="header__inner">
                <div class="header__icon"><a href="index.html"><img
                            src="{{ asset('/') }}cryptex/cryptex/images/icons/arrow-back.svg" alt=""
                            title="" /></a></div>
            </div>
        </header> --}}



        <div class="login">

            <div class="login__content">
                <div class="" style="display:flex; justify-content:center; align-items:center; margin:0 auto;">
                    <img src="{{ asset('') }}logo.png" alt="">
                </div><br><br>
                <div class="login-form">
                    <form id="LoginForm" method="POST" action="{{ route('mobile.proses.login') }}">
                        @csrf
                        <div class="login-form__row">
                            <label class="login-form__label">Email</label>
                            <input type="email" name="email" value="" class="login-form__input required" />
                        </div>
                        <div class="login-form__row">
                            <label class="login-form__label">Password</label>
                            <input type="password" name="password" value="" class="login-form__input required" />
                        </div>
                        <div class="login-form__row">
                            <input type="submit" name="submit"
                                class="login-form__submit button button--main button--full" id="submit"
                                value="MASUK" />
                        </div>
                    </form>

                    <div class="login-form__bottom">
                        <p>Tidak memiliki akun? <br /><a href="/mobile/registrasi">DAFTAR</a></p>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- PAGE END -->



    <script src="{{ asset('/') }}cryptex/cryptex/js/jquery-3.7.1.js"></script>
    <script src="{{ asset('/') }}otika/assets/bundles/izitoast/js/iziToast.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('/') }}otika/assets/js/page/toastr.js"></script>

    {{-- <script src="{{ asset('/') }}cryptex/cryptex/vendor/jquery/jquery-3.5.1.min.js"></script> --}}
    <script src="{{ asset('/') }}cryptex/cryptex/vendor/jquery/jquery.validate.min.js"></script>
    <script src="{{ asset('/') }}cryptex/cryptex/vendor/swiper/swiper.min.js"></script>
    <script src="{{ asset('/') }}cryptex/cryptex/js/jquery.custom.js"></script>


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
</body>

</html>
