<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | Simeskul</title>
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

</head>

<body>
    <main class="main-wrapper">

        <!-- ...:::Start User Event Section:::... -->
        <div class="header-section">
            <div class="container">
                <br><br>
                <!-- Start User Event Area -->
                <div class="header-area">
                    <div class="header-top-area header-top-area--style-1">
                        <ul class="event-list">
                            @yield('list-item')
                            <li class="list-item">
                                <h2 class="title text-center">@yield('title')</h2>
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
            <br><br>
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

        <!-- ...:::Start Search & Filter Section:::... -->
        <div class="search-n-filter-section section-gap-top-25">
            <div class="container">

                <div class="shop-filter" id="shop-filter-menu">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="shop-filter-block mt-0">
                                    <h4 class="shop-filter-block__title">Price</h4>
                                    <div class="shop-filter-block__content">
                                        <div class="widget-price-range">
                                            <input type="text" id="price-range-slider">
                                        </div>
                                    </div>
                                </div>
                                <ul class="product-variable-lists">
                                    <li class="list-item">
                                        <div class="left">Size</div>
                                        <div class="right">
                                            <ul class="size-chart inner-child-item">
                                                <li>
                                                    <label for="samll">
                                                        <input type="radio" name="size" id="samll"
                                                            checked="">
                                                        <span class="size-text">S</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="medium">
                                                        <input type="radio" name="size" id="medium">
                                                        <span class="size-text">M</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="large">
                                                        <input type="radio" name="size" id="large">
                                                        <span class="size-text">L</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="xlarge">
                                                        <input type="radio" name="size" id="xlarge">
                                                        <span class="size-text">XL</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="xxlarge">
                                                        <input type="radio" name="size" id="xxlarge">
                                                        <span class="size-text">XXL</span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="list-item">
                                        <div class="left">Color</div>
                                        <div class="right">
                                            <ul class="color-chart inner-child-item">
                                                <li>
                                                    <label for="blue">
                                                        <input type="radio" name="color" id="blue">
                                                        <span class="color-box color-box--blue"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="orange">
                                                        <input type="radio" name="color" id="orange"
                                                            checked="">
                                                        <span class="color-box color-box--orange"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="violet">
                                                        <input type="radio" name="color" id="violet">
                                                        <span class="color-box color-box--violet"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="pink">
                                                        <input type="radio" name="color" id="pink">
                                                        <span class="color-box color-box--pink"></span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                </ul>
                                <div class="shop-filter-block">
                                    <h4 class="shop-filter-block__title">Brand</h4>
                                    <div class="shop-filter-block__content">
                                        <ul class="shop-filter-block__brand">
                                            <li><button>HasThemes</button></li>
                                            <li><button class="active">HasTech</button></li>
                                            <li><button>Bootxperts</button></li>
                                            <li><button>Codecarnival</button></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="shop-filter-block">
                                    <button class="apply-btn">APPLY</button>
                                    <button class="cancel-btn">CANCEL</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ...:::End Search & Filter Section:::... -->

        @yield('content')

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

    <script>
        function filterFunction(that, event) {
            let container, input, filter, li, input_val;
            container = $(that).closest(".searchable");
            input_val = container.find("input").val().toUpperCase();
            if (["ArrowDown", "ArrowUp", "Enter"].indexOf(event.key) != -1) {
                keyControl(event, container);
            } else {
                li = container.find("ul li");
                li.each(function(i, obj) {
                    if ($(this).text().toUpperCase().indexOf(input_val) > -1) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
                container.find("ul li").removeClass("selected");
                setTimeout(function() {
                    container.find("ul li:visible").first().addClass("selected");
                }, 100);
            }
        }

        function keyControl(e, container) {
            if (e.key == "ArrowDown") {
                if (container.find("ul li").hasClass("selected")) {
                    if (
                        container
                        .find("ul li:visible")
                        .index(container.find("ul li.selected")) +
                        1 <
                        container.find("ul li:visible").length
                    ) {
                        container
                            .find("ul li.selected")
                            .removeClass("selected")
                            .nextAll()
                            .not('[style*="display: none"]')
                            .first()
                            .addClass("selected");
                    }
                } else {
                    container.find("ul li:first-child").addClass("selected");
                }
            } else if (e.key == "ArrowUp") {
                if (
                    container.find("ul li:visible").index(container.find("ul li.selected")) >
                    0
                ) {
                    container
                        .find("ul li.selected")
                        .removeClass("selected")
                        .prevAll()
                        .not('[style*="display: none"]')
                        .first()
                        .addClass("selected");
                }
            } else if (e.key == "Enter") {
                container.find("input").val(container.find("ul li.selected").text()).blur();
                onSelect(container.find("ul li.selected").text());
            }
        }

        function onSelect(val) {}
        $(".searchable input").focus(function() {
            $(this).closest(".searchable").find("ul").show();
            $(this).closest(".searchable").find("ul li").show();
            $('.submit__btn').css({
                "display": "block"
            })
            $('.close__btn').css({
                "display": "block"
            })
            $('.search__btn').css({
                'display': "none"
            })
        });
        $(".searchable input").blur(function() {
            let that = this;
            setTimeout(function() {
                $(that).closest(".searchable").find("ul").hide();
                $('.search__btn').css({
                    'display': "block"
                })
                $('.submit__btn').css({
                    "display": "none"
                })
                $('.close__btn').css({
                    "display": "none"
                })
            }, 300);
        });
        $('.search__btn').on("click", function() {
            $(this).closest(".searchable").find("input").val($(this).text()).blur();
            onSelect($(this).text());
        });
        $(document).on("click", ".searchable ul li", function() {
            $(this).closest(".searchable").find("input").val($(this).text()).blur();
            onSelect($(this).text());
        });
        $(".searchable ul li").hover(function() {
            $(this).closest(".searchable").find("ul li.selected").removeClass("selected");
            $(this).addClass("selected");
        });
        $('.close__btn').on('click', function() {
            $('.searchable').find("input").val($(this).text()).blur()
            $(this).css({
                "display": "none"
            })
        })
    </script>

</body>

</html>
