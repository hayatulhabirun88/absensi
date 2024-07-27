<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registrasi | Simeskul</title>
    <meta name="Googlebot" content="noindex" />
    <meta name="description"
        content="Carce is an exclusive ecommerce mobile app template with 2 distinct layouts. This superb mobile app template for ecommerce embodies a professional-looking mobile website design while providing tons of features.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="{{ asset('/') }}carce/carce/assets/images/favicon.ico" type="image/png">

    <!-- ::::::::::::::All Google Fonts::::::::::::::-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}carce/carce/assets/css/vendor/icomoon.css" />

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}carce/carce/assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}carce/carce/assets/css/plugins/ion.rangeSlider.min.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}carce/carce/assets/css/style.css">

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <link rel="stylesheet" href="{{ asset('/') }}carce/carce/assets/css/vendor/vendor.min.css">
<link rel="stylesheet" href="{{ asset('/') }}carce/carce/assets/css/plugins/plugins.min.css">
<link rel="stylesheet" href="{{ asset('/') }}carce/carce/assets/css/style.min.css"> -->

</head>

<body>

    <main class="main-wrapper">

        <!-- ...:::Start Login Section:::... -->
        <div class="login-section mt-115">
            <br><br>
            <div class="container">
                <!-- Start User Event Area -->
                <div class="login-wrapper">
                    <div class="section-content">
                        <h1 class="title">Registrasi sebagai Orang Tua Siswa</h1>
                        <p>Registrasikan akun anda dengan cara mengisi form dibawah ini.</p>
                    </div>
                    <form action="{{ route('mobile.registrasi.proses.orangtua') }}" class="default-form-wrapper"
                        method="post">
                        @csrf
                        <ul class="default-form-list">
                            <li class="single-form-item">
                                <label for="nama_lengkap" class="visually-hidden">Nama Lengkap</label>
                                <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap"
                                    value="{{ old('nama_lengkap') }}">
                                <span class="icon">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                                @error('nama_lengkap')
                                    <span style="color:red; margin-left:70px;">{{ $message }}</span>
                                @enderror
                            </li>
                            <li class="single-form-item">
                                <label for="pekerjaan" class="visually-hidden">Pekerjaan</label>
                                <input type="text" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan"
                                    value="{{ old('pekerjaan') }}">
                                <span class="icon"><svg class="w-6 h-6 text-gray-800 dark:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M7.833 2c-.507 0-.98.216-1.318.576A1.92 1.92 0 0 0 6 3.89V21a1 1 0 0 0 1.625.78L12 18.28l4.375 3.5A1 1 0 0 0 18 21V3.889c0-.481-.178-.954-.515-1.313A1.808 1.808 0 0 0 16.167 2H7.833Z" />
                                    </svg>
                                </span>
                                @error('pekerjaan')
                                    <span style="color:red; margin-left:70px;">{{ $message }}</span>
                                @enderror
                            </li>
                            <li class="single-form-item">
                                <label for="alamat" class="visually-hidden">Alamat</label>
                                <input type="text" id="alamat" name="alamat" placeholder="Alamat"
                                    value="{{ old('alamat') }}">
                                <span class="icon">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                                @error('alamat')
                                    <span style="color:red; margin-left:70px;">{{ $message }}</span>
                                @enderror
                            </li>
                            <li class="single-form-item">
                                <label for="no_hp" class="visually-hidden">No HP</label>
                                <input type="text" id="no_hp" name="no_hp" placeholder="No HP"
                                    value="{{ old('no_hp') }}">
                                <span class="icon">
                                    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 24 24"
                                        id="handphone-device" data-name="Line Color"
                                        xmlns="http://www.w3.org/2000/svg" class="icon line-color">
                                        <line id="secondary" x1="13" y1="17" x2="11"
                                            y2="17"
                                            style="fill: none; stroke: rgb(44, 169, 188); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                        </line>
                                        <rect id="primary" x="6" y="3" width="12" height="18"
                                            rx="1"
                                            style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                        </rect>
                                    </svg>
                                </span>
                                @error('no_hp')
                                    <span style="color:red; margin-left:70px;">{{ $message }}</span>
                                @enderror
                            </li>
                            <li class="single-form-item">
                                <label for="siswa" class="visually-hidden">siswa</label>
                                <select
                                    style="border: 2px solid #e2e7ea;border-radius: 10px;padding: 18px 25px 18px 80px;width: -webkit-fill-available; background-color:white; font-size: 14px;width: 100%;"
                                    name="siswa" id="siswa">
                                    <option value="">Pilih Siswa</option>
                                    @foreach ($siswa as $sis)
                                        <option value="{{ $sis->id }}"
                                            {{ old('siswa') == $sis->id ? 'selected' : '' }}>
                                            {{ $sis->nama_lengkap }} | Kelas:{{ $sis->kelas }}</option>
                                    @endforeach
                                </select>
                                <span class="icon">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                </span>
                                @error('siswa')
                                    <span style="color:red; margin-left:70px;">{{ $message }}</span>
                                @enderror
                            </li>

                            <li class="single-form-item">
                                <label for="email" class="visually-hidden">Email</label>
                                <input type="email" id="email" name="email" placeholder="Email"
                                    value="{{ old('email') }}">
                                <span class="icon"><i class="icon icon-carce-mail"></i></span>
                                @error('email')
                                    <span style="color:red; margin-left:70px;">{{ $message }}</span>
                                @enderror
                            </li>
                            <li class="single-form-item">
                                <label for="password" class="visually-hidden">Password</label>
                                <input type="password" id="password" name="password" placeholder="Password">
                                <span class="icon"><i class="icon icon-carce-eye"></i></span>
                                @error('password')
                                    <span style="color:red; margin-left:70px;">{{ $message }}</span>
                                @enderror
                            </li>
                            <li class="single-form-item">
                                <label for="password_confirmation" class="visually-hidden">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    placeholder="Konfirmasi Password">
                                <span class="icon"><i class="icon icon-carce-eye"></i></span>
                                @error('password_confirmation')
                                    <span style="color:red; margin-left:70px;">{{ $message }}</span>
                                @enderror
                            </li>
                        </ul>
                        <input type="submit" name="submit" value="DAFTAR"
                            class="btn btn--block btn--radius btn--size-xlarge btn--color-white btn--bg-maya-blue text-center register-space-top"
                            style="width: 100%">
                    </form>
                </div>

                <div class="sign-account-text text-center">Sudah memiliki akun? <a href="/mobile/login"
                        class="btn--color-radical-red">Login</a></div>
                <!-- End User Event Area -->
            </div>
        </div><br><br>
        <!-- ...:::End User Event Section:::... -->

    </main>

    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor -->
    <script src="{{ asset('/') }}carce/carce/assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="{{ asset('/') }}carce/carce/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('/') }}carce/carce/assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>

    <!--Plugins JS-->
    <script src="{{ asset('/') }}carce/carce/assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="{{ asset('/') }}carce/carce/assets/js/plugins/ion.rangeSlider.min.js"></script>

    <!-- Minify Version -->
    <!-- <script src="{{ asset('/') }}carce/carce/assets/js/vendor.min.js"></script>
    <script src="{{ asset('/') }}carce/carce/assets/js/plugins.min.js"></script> -->

    <!--Main JS (Common Activation Codes)-->
    <script src="{{ asset('/') }}carce/carce/assets/js/main.js"></script>
    <!-- <script src="{{ asset('/') }}carce/carce/assets/js/main.min.js"></script> -->
    <script>
        $(document).ready(function() {
            document.addEventListener('DOMContentLoaded', function() {
                var dateInputs = document.querySelectorAll('input[type="date"]');

                dateInputs.forEach(function(input) {
                    if (!input.value) {
                        input.classList.add('placeholder-visible');
                    }

                    input.addEventListener('change', function() {
                        if (input.value) {
                            input.classList.remove('placeholder-visible');
                        } else {
                            input.classList.add('placeholder-visible');
                        }
                    });
                });
            });
        });
    </script>

</body>

</html>
