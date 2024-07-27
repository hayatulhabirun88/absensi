<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Setting | Simeskul</title>
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
</head>

<body>

    <main class="main-wrapper overflow-x-hidden">

        <!-- ...:::Start User Event Section:::... -->
        <div class="header-section">
            <div class="container">
                <br><br>
                <!-- Start User Event Area -->
                <div class="header-area">
                    <div class="header-top-area header-top-area--style-1">
                        <ul class="event-list">
                            <li class="list-item">
                            </li>
                            <li class="list-item">
                                <h2 class="title text-center">Setting</h2>
                            </li>
                            <li class="list-item">
                                <ul class="list-child">
                                    <li class="list-item">
                                        <span class="notch-bg notch-bg--emerald"></span>
                                        <a href="#profile-menu-offcanvas" area-label="User"
                                            class="btn btn--size-33-33 btn--center btn--round offcanvas-toggle offside-menu">
                                            <img class="img-fluid" height="33" width="33"
                                                src="{{ asset('/') }}carce/carce/assets/images/header-top-user-img.jpg"
                                                alt="user image"></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End User Event Area -->
            </div>
        </div>
        <!-- ...:::End User Event Section:::... -->

        <!--  Start Offcanvas Mobile Menu Section -->
        <div id="mobile-menu-offcanvas" class="offcanvas offcanvas-leftside offcanvas-mobile-menu-section">
            <!-- Start Offcanvas Header -->
            <div class="offcanvas-header flex-end">

                <div class="logo">
                    <a href="index.html"><img class="img-fluid" width="147" height="26"
                            src="{{ asset('/') }}carce/carce/assets/images/logo.png" alt="image"></a>
                </div>

                <button class="offcanvas-close" aria-label="offcanvas svg icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="5.973" height="10.449" viewBox="0 0 5.973 10.449">
                        <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back"
                            d="M13.051,11.417,17,7.466a.747.747,0,0,0-1.058-1.054l-4.479,4.476a.745.745,0,0,0-.022,1.03l4.5,4.507A.747.747,0,1,0,17,15.37Z"
                            transform="translate(-11.251 -6.194)" />
                    </svg>
                </button>
            </div>
            <!-- End Offcanvas Header -->

            <!-- Start Offcanvas Mobile Menu Wrapper -->
            <div class="offcanvas-mobile-menu-wrapper">
                <!-- Start Mobile Menu  -->
                <div class="mobile-menu-bottom">
                    <!-- Start Mobile Menu Nav -->
                    <div class="offcanvas-menu">
                        <ul>
                            <li>
                                <a href="index.html"><span>Home</span></a>
                            </li>
                            <li>
                                <a href="#"><span>Shop</span></a>
                                <ul class="mobile-sub-menu">
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="single-product.html">Product</a></li>
                                    <li><a href="shop-category.html">Shop Category</a></li>
                                </ul>

                            </li>
                            <li>
                                <a href="#"><span>Pages</span></a>
                                <ul class="mobile-sub-menu">
                                    <li><a href="chat.html">Chat</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="order.html">Order</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="register.html">Register</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div> <!-- End Mobile Menu Nav -->
                </div> <!-- End Mobile Menu -->

                <!-- Start Mobile contact Info -->
                <div class="mobile-contact-info">
                    <address class="address">
                        <span>Address: 4710-4890 Breckinridge St, Fayettevill</span>
                        <span>Call Us: (+800) 345 678, (+800) 123 456</span>
                        <span>Email: yourmail@mail.com</span>
                    </address>
                </div>
                <!-- End Mobile contact Info -->

            </div> <!-- End Offcanvas Mobile Menu Wrapper -->
        </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

        <!--  Start Offcanvas Profile Menu Section -->
        <div id="profile-menu-offcanvas" class="offcanvas offcanvas-rightside">
            <!-- Start Offcanvas Header -->
            <div class="offcanvas-header flex-start offcanvas-modify">
                <button class="offcanvas-close" aria-label="offcanvas svg icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="5.973" height="10.449" viewBox="0 0 5.973 10.449">
                        <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back"
                            d="M13.051,11.417,17,7.466a.747.747,0,0,0-1.058-1.054l-4.479,4.476a.745.745,0,0,0-.022,1.03l4.5,4.507A.747.747,0,1,0,17,15.37Z"
                            transform="translate(-11.251 -6.194)" />
                    </svg>
                </button>
                <span>Home</span>

            </div> <!-- End Offcanvas Header -->
            <!-- Start Offcanvas Mobile Menu Wrapper -->
            <div class="offcanvas-profile-menu-wrapper">
                <!-- ...:::Start Profile Card Section:::... -->
                <div class="profile-card-section section-gap-top-25">
                    <div class="profile-card-wrapper">
                        <div class="image">
                            <img class="img-fluid" width="96" height="96"
                                src="{{ asset('/') }}carce/carce/assets/images/user/user-profile.png"
                                alt="image">
                        </div>
                        <div class="content">
                            <h2 class="name">{{ auth()->user()->name }}</h2>
                            <span class="email">{{ auth()->user()->email }}</span>
                        </div>
                        <div class="profile-shape profile-shape-1"><img class="img-fluid" width="61"
                                height="50" src="{{ asset('/') }}carce/carce/assets/images/profile-shape-1.svg"
                                alt="image"></div>
                        <div class="profile-shape profile-shape-2"><img class="img-fluid" width="48"
                                height="59" src="{{ asset('/') }}carce/carce/assets/images/profile-shape-2.svg"
                                alt="image"></div>
                    </div>
                </div>
                <!-- ...:::End Profile Card Section:::... -->

                <!-- ...:::Start Profile Details Section:::... -->
                <div class="profile-details-section section-gap-top-30">
                    <div class="profile-details-wrapper">
                        <div class="profile-details-bottom">
                            <ul class="profile-user-list">
                                <li class="profile-list-item">
                                    <ul class="profile-single-list">

                                        <li class="list-item">
                                            <span class="title">Setting</span>
                                        </li>
                                        <li class="list-item">
                                            <a href="/mobile/setting" class="profile-link"><span class="icon"><i
                                                        class="icon icon-carce-user"></i></span>Setting
                                                Akun</a>
                                        </li>
                                        <li class="list-item">
                                            <a href="#" class="profile-link"><span class="icon"><i
                                                        class="icon icon-carce-bell"></i></span>Notifikasi</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="profile-list-item">
                                    <ul class="profile-single-list">
                                        <li class="list-item">
                                            <a href="/mobile/logout" class="profile-link"><span class="icon"><i
                                                        class="icon icon-carce-login"></i></span>Keluar</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ...:::End Profile Details Section:::... -->
            </div> <!-- End Offcanvas Mobile Menu Wrapper -->
        </div> <!-- ...:::: End Offcanvas Profile Menu Section:::... -->

        <div class="offcanvas-overlay"></div>

        <!-- ...:::Start Contact Section:::... -->
        <div class="contact-section section-gap-top-30">
            <div class="container">

                <div class="profile-card-section section-gap-top-25">
                    <div class="profile-card-wrapper">
                        <div class="image">
                            <img class="img-fluid"
                                src="{{ asset('/') }}carce/carce/assets/images/user/user-profile.png"
                                alt="" width="96" height="96">
                            <label class="upload-image-label" for="file">
                                <i class="icon icon-carce-camera"></i>
                            </label>
                            <input class="upload-file" id="file" type="file">
                        </div>
                        <div class="content">
                            <h2 class="setting-name">{{ auth()->user()->name }}</h2>
                            <span class="setting-email email">{{ auth()->user()->email }}</span>
                        </div>
                        <div class="profile-shape profile-shape-1"><img class="img-fluid"
                                src="{{ asset('/') }}carce/carce/assets/images/profile-shape-1.svg" alt=""
                                width="61" height="50"></div>
                        <div class="profile-shape profile-shape-2"><img class="img-fluid"
                                src="{{ asset('/') }}carce/carce/assets/images/profile-shape-2.svg" alt=""
                                width="48" height="59"></div>
                    </div>
                </div>

                <!-- Start User Event Area -->
                <div class="login-wrapper">
                    @if (session('success'))
                        <div
                            style="background-color:green; padding:10px; border-radius:5px; margin-top:20px; color:white;">
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif
                    @if (auth()->user()->level == 'siswa')
                        <form action="{{ route('mobile.setting.proses.siswa') }}" method="POST"
                            class="default-form-wrapper">
                            @csrf
                            <ul class="default-form-list">
                                <li class="single-form-item">
                                    <label for="nama_lengkap" class="visually-hidden">Nama Lengkap</label>
                                    <input type="text" id="nama_lengkap" name="nama_lengkap"
                                        placeholder="Nama Lengkap"
                                        value="{{ old('nama_lengkap', @$datasetting->nama_lengkap) }}">
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
                                    <label for="kelas" class="visually-hidden">Kelas</label>
                                    <input type="text" id="kelas" name="kelas" placeholder="Kelas"
                                        value="{{ old('kelas', @$datasetting->kelas) }}">
                                    <span class="icon"><svg class="w-6 h-6 text-gray-800 dark:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M3.559 4.544c.355-.35.834-.544 1.33-.544H19.11c.496 0 .975.194 1.33.544.356.35.559.829.559 1.331v9.25c0 .502-.203.981-.559 1.331-.355.35-.834.544-1.33.544H15.5l-2.7 3.6a1 1 0 0 1-1.6 0L8.5 17H4.889c-.496 0-.975-.194-1.33-.544A1.868 1.868 0 0 1 3 15.125v-9.25c0-.502.203-.981.559-1.331ZM7.556 7.5a1 1 0 1 0 0 2h8a1 1 0 0 0 0-2h-8Zm0 3.5a1 1 0 1 0 0 2H12a1 1 0 1 0 0-2H7.556Z"
                                                clip-rule="evenodd" />
                                        </svg></span>
                                    @error('kelas')
                                        <span style="color:red; margin-left:70px;">{{ $message }}</span>
                                    @enderror
                                </li>
                                <li class="single-form-item">
                                    <label for="tempat_lahir" class="visually-hidden">Tempat Lahir</label>
                                    <input type="text" id="tempat_lahir" name="tempat_lahir"
                                        placeholder="Tempat Lahir"
                                        value="{{ old('tempat_lahir', @$datasetting->tempat_lahir) }}">
                                    <span class="icon"><svg class="w-6 h-6 text-gray-800 dark:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M5 9a7 7 0 1 1 8 6.93V21a1 1 0 1 1-2 0v-5.07A7.001 7.001 0 0 1 5 9Zm5.94-1.06A1.5 1.5 0 0 1 12 7.5a1 1 0 1 0 0-2A3.5 3.5 0 0 0 8.5 9a1 1 0 0 0 2 0c0-.398.158-.78.44-1.06Z"
                                                clip-rule="evenodd" />
                                        </svg></span>

                                    @error('tempat_lahir')
                                        <span style="color:red; margin-left:70px;">{{ $message }}</span>
                                    @enderror
                                </li>
                                <li class="single-form-item">
                                    <label for="tgl_lahir" class="visually-hidden">Tanggal Lahir</label>
                                    <input type="date" id="tgl_lahir" name="tgl_lahir"
                                        placeholder="Tanggal Lahir"
                                        value="{{ old('tgl_lahir', @$datasetting->tgl_lahir) }}"
                                        style="width: 65%; background-color:white;"> <span style="color:green">Tanggal
                                        Lahir</span>
                                    <span class="icon"><svg class="w-6 h-6 text-gray-800 dark:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M20 7h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C10.4 2.842 8.949 2 7.5 2A3.5 3.5 0 0 0 4 5.5c.003.52.123 1.033.351 1.5H4a2 2 0 0 0-2 2v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9a2 2 0 0 0-2-2Zm-9.942 0H7.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM13 14h-2v8h2v-8Zm-4 0H4v6a2 2 0 0 0 2 2h3v-8Zm6 0v8h3a2 2 0 0 0 2-2v-6h-5Z" />
                                        </svg></span><br>

                                    @error('tgl_lahir')
                                        <span style="color:red; margin-left:70px;">{{ $message }}</span>
                                    @enderror
                                </li>
                                <li class="single-form-item">
                                    <label for="alamat" class="visually-hidden">Alamat</label>
                                    <input type="text" id="alamat" name="alamat" placeholder="Alamat"
                                        value="{{ old('alamat', @$datasetting->alamat) }}">
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
                                        value="{{ old('no_hp', @$datasetting->no_hp) }}">
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
                                    <label for="hobi" class="visually-hidden">Hobi</label>
                                    <input type="text" id="hobi" name="hobi" placeholder="Hobi"
                                        value="{{ old('hobi', @$datasetting->hobi) }}">
                                    <span class="icon">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="m7.4 3.736 3.43 3.429A5.046 5.046 0 0 1 12.133 7c.356.01.71.06 1.056.147l3.41-3.412a2.32 2.32 0 0 1 .451-.344A9.89 9.89 0 0 0 12.268 2a10.022 10.022 0 0 0-5.322 1.392c.165.095.318.211.454.344Zm11.451 1.54-.127-.127a.5.5 0 0 0-.706 0l-2.932 2.932c.03.023.05.054.078.077.237.194.454.41.651.645.033.038.077.067.11.107l2.926-2.927a.5.5 0 0 0 0-.707Zm-2.931 9.81c-.025.03-.058.052-.082.082a4.97 4.97 0 0 1-.633.639c-.04.036-.072.083-.115.117l2.927 2.927a.5.5 0 0 0 .707 0l.127-.127a.5.5 0 0 0 0-.707l-2.932-2.931Zm-1.443-4.763a3.037 3.037 0 0 0-1.383-1.1l-.012-.007a2.956 2.956 0 0 0-1-.213H12a2.964 2.964 0 0 0-2.122.893c-.285.29-.509.634-.657 1.013l-.009.016a2.96 2.96 0 0 0-.21 1 2.99 2.99 0 0 0 .488 1.716l.032.04a3.04 3.04 0 0 0 1.384 1.1l.012.007c.319.129.657.2 1 .213.393.015.784-.05 1.15-.192.012-.005.021-.013.033-.018a3.01 3.01 0 0 0 1.676-1.7v-.007a2.89 2.89 0 0 0 0-2.207 2.868 2.868 0 0 0-.27-.515c-.007-.012-.02-.025-.03-.039Zm6.137-3.373a2.53 2.53 0 0 1-.349.447l-3.426 3.426c.112.428.166.869.161 1.311a4.954 4.954 0 0 1-.148 1.054l3.413 3.412c.133.134.249.283.347.444A9.88 9.88 0 0 0 22 12.269a9.913 9.913 0 0 0-1.386-5.319ZM16.6 20.264l-3.42-3.421c-.386.1-.782.152-1.18.157h-.135c-.356-.01-.71-.06-1.056-.147L7.4 20.265a2.503 2.503 0 0 1-.444.347A9.884 9.884 0 0 0 11.732 22H12a9.9 9.9 0 0 0 5.044-1.388 2.515 2.515 0 0 1-.444-.348ZM3.735 16.6l3.426-3.426a4.608 4.608 0 0 1-.013-2.367L3.735 7.4a2.508 2.508 0 0 1-.349-.447 9.889 9.889 0 0 0 0 10.1 2.48 2.48 0 0 1 .35-.453Zm5.101-.758a4.959 4.959 0 0 1-.65-.645c-.034-.038-.078-.067-.11-.107L5.15 18.017a.5.5 0 0 0 0 .707l.127.127a.5.5 0 0 0 .706 0l2.932-2.933c-.029-.018-.049-.053-.078-.076Zm-.755-6.928c.03-.037.07-.063.1-.1.183-.22.383-.423.6-.609.046-.04.081-.092.128-.13L5.983 5.149a.5.5 0 0 0-.707 0l-.127.127a.5.5 0 0 0 0 .707l2.932 2.931Z" />
                                        </svg>
                                    </span>
                                    @error('hobi')
                                        <span style="color:red; margin-left:70px;">{{ $message }}</span>
                                    @enderror
                                </li>
                                <li class="single-form-item">
                                    <label for="Ekstrakulikuler" class="visually-hidden">Ekstrakulikuler</label>
                                    <select
                                        style="border: 2px solid #e2e7ea;border-radius: 10px;padding: 18px 25px 18px 80px;width: -webkit-fill-available; background-color:white; font-size: 14px;width: 100%;"
                                        name="ekstrakulikuler" id="ekstrakulikuler">
                                        <option value="">Pilih Ekstrakulikuler</option>
                                        @foreach ($ekstrakulikuler as $eks)
                                            <option value="{{ $eks->id }}"
                                                {{ old('ekstrakulikuler', @$datasetting->ekstrakulikuler_id) == $eks->id ? 'selected' : '' }}>
                                                {{ $eks->nama_ekstrakulikuler }}</option>
                                        @endforeach
                                    </select>
                                    <span class="icon">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M5 6a3 3 0 1 1 4 2.83V9a4 4 0 0 0 4 4h.17a3.001 3.001 0 1 1 0 2H13a5.978 5.978 0 0 1-4-1.528v1.699a3.001 3.001 0 1 1-2 0V8.829A3.001 3.001 0 0 1 5 6Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </span>
                                    @error('ekstrakulikuler')
                                        <span style="color:red; margin-left:70px;">{{ $message }}</span>
                                    @enderror
                                </li>
                                <li class="single-form-item">
                                    <label for="email" class="visually-hidden">Email</label>
                                    <input type="email" id="email" name="email" placeholder="Email"
                                        value="{{ old('email', auth()->user()->email) }}">
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
                                    <label for="password_confirmation" class="visually-hidden">Confirm
                                        Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        placeholder="Konfirmasi Password">
                                    <span class="icon"><i class="icon icon-carce-eye"></i></span>
                                    @error('password_confirmation')
                                        <span style="color:red; margin-left:70px;">{{ $message }}</span>
                                    @enderror
                                </li>
                            </ul>
                            <input type="submit" name="submit" value="Save"
                                class="btn btn--block btn--radius btn--size-xlarge btn--color-white btn--bg-maya-blue text-center register-space-top"
                                style="width: 100%">
                        </form>
                    @else
                        <form action="{{ route('mobile.setting.proses.orangtua') }}" method="POST"
                            class="default-form-wrapper">
                            @csrf
                            <ul class="default-form-list">
                                <li class="single-form-item">
                                    <label for="nama_lengkap" class="visually-hidden">Nama Lengkap</label>
                                    <input type="text" id="nama_lengkap" name="nama_lengkap"
                                        placeholder="Nama Lengkap"
                                        value="{{ old('nama_lengkap', @$datasetting->nama_orangtua) }}">
                                    <span class="icon"><i class="icon icon-carce-user"></i></span>
                                    @error('nama_lengkap')
                                        <span style="color:red; margin-left:70px;">{{ $message }}</span>
                                    @enderror
                                </li>
                                <li class="single-form-item">
                                    <label for="pekerjaan" class="visually-hidden">Pekerjaan</label>
                                    <input type="text" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan"
                                        value="{{ old('pekerjaan', @$datasetting->pekerjaan) }}">
                                    <span class="icon"><i class="icon icon-carce-user"></i></span>
                                    @error('pekerjaan')
                                        <span style="color:red; margin-left:70px;">{{ $message }}</span>
                                    @enderror
                                </li>
                                <li class="single-form-item">
                                    <label for="alamat" class="visually-hidden">Alamat</label>
                                    <input type="text" id="alamat" name="alamat" placeholder="Alamat"
                                        value="{{ old('alamat', @$datasetting->alamat) }}">
                                    <span class="icon">
                                        <i class="icon icon-carce-user"></i>
                                    </span>
                                    @error('alamat')
                                        <span style="color:red; margin-left:70px;">{{ $message }}</span>
                                    @enderror
                                </li>
                                <li class="single-form-item">
                                    <label for="no_hp" class="visually-hidden">No HP</label>
                                    <input type="text" id="no_hp" name="no_hp" placeholder="No HP"
                                        value="{{ old('no_hp', @$datasetting->no_hp) }}">
                                    <span class="icon">
                                        <i class="icon icon-carce-user"></i>
                                    </span>
                                    @error('no_hp')
                                        <span style="color:red; margin-left:70px;">{{ $message }}</span>
                                    @enderror
                                </li>
                                <li class="single-form-item">
                                    <label for="siswa" class="visually-hidden">Siswa</label>
                                    <input type="text" id="siswa" placeholder="Siswa"
                                        value="{{ old('siswa', @$datasetting->pendaftar->nama_lengkap) }}">
                                    <span class="icon">
                                        <i class="icon icon-carce-user"></i>
                                    </span>
                                    @error('siswa')
                                        <span style="color:red; margin-left:70px;">{{ $message }}</span>
                                    @enderror
                                </li>
                                <li class="single-form-item">
                                    <label for="email" class="visually-hidden">Email</label>
                                    <input type="email" id="email" name="email" placeholder="Email"
                                        value="{{ old('email', auth()->user()->email) }}">
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
                                    <label for="password_confirmation" class="visually-hidden">Confirm
                                        Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        placeholder="Konfirmasi Password">
                                    <span class="icon"><i class="icon icon-carce-eye"></i></span>
                                    @error('password_confirmation')
                                        <span style="color:red; margin-left:70px;">{{ $message }}</span>
                                    @enderror
                                </li>
                            </ul>
                            <input type="submit" name="submit" value="Save"
                                class="btn btn--block btn--radius btn--size-xlarge btn--color-white btn--bg-maya-blue text-center register-space-top"
                                style="width: 100%">
                        </form>
                    @endif
                </div>

            </div>
        </div>
        <!-- ...:::End Contact Section:::... -->

        <!-- ...:::Start User Event Section:::... -->
        <div class="user-event-section" style="width: 100% !important;">
            <!-- Start User Event Area -->
            <div class="col pos-relative">

                <div class="user-event-area">
                    <div class="user-event user-event--left">
                        <a area-label="event link icon" href="/mobile/setting" class="event-btn-link"><i
                                class="icon icon-carce-heart"></i></a>

                    </div>
                    <div class="user-event user-event--center">
                        <a area-label="cart icon" href="/mobile/dashboard" class="event-btn-link"><i
                                class="icon icon-carce-home"></i></a>
                    </div>
                    <div class="user-event user-event--right">
                        <a area-label="order icon" href="/mobile/logout" class="event-btn-link"><i
                                class="icon icon-carce-compare"></i></a>
                    </div>
                </div>
            </div>
            <!-- End User Event Area -->
        </div>
        <!-- ...:::End User Event Section:::... -->

        <footer class="footer-section"></footer>
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

</body>

</html>
