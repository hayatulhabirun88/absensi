@extends('mobile.template.content')

@section('title', 'Dashboard')

@section('list-item')

    <li class="list-item">
    </li>

@endsection

@section('content')
    <!-- ...:::Start Hero Slider Section:::... -->
    <div class="hero-section section-gap-top-25">
        <div class="container">
            <!-- Start Hero Area -->
            <div class="hero-area hero-area--style-1 hero-slider-active">
                <!-- Slider main container -->
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($gallery as $gbr)
                            <div class="swiper-slide">
                                <div class="hero-singel-slide ">
                                    <div class="hero-bg">
                                        <img width="388" height="160" class="img-full"
                                            src="{{ asset('/') }}{{ env('ASSET_UPLOAD') }}foto/{{ $gbr->foto }}"
                                            alt="image">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
            <!-- End Hero Area -->
        </div>
    </div>
    <!-- ...:::End Hero Slider Section:::... -->

    <!-- ...:::Start Catagories - 1 Section:::... -->
    <div class="catagories-section section-gap-top-50">
        <div class="container">
            <div class="catagories-area">
                <div class="catagories-nav-1">
                    <!-- Slider main container -->
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @include('mobile.template.menu')
                        </div>
                    </div>
                </div>
            </div>

            <div class="title-content">
                <h2 class="title">Presensi</h2>
                <a href="/mobile/presensi" class="view-all">Lihat Semua</a>
            </div>
            <div class="product-wrapper">
                <div class="product-wrapper-content--4">
                    @if (count($presensi) > 0)
                        @foreach ($presensi as $presens)
                            <div id="single-product-item" class="single-product-item product-item--style-4">
                                <div>
                                    <a href="single-product.html" class="title">
                                        {{ $presens->tgl_presensi }} <strong>Ekskul
                                            {{ @$presens->nama_ekstrakulikuler }}</strong> |
                                        Pembina: {{ @$presens->nama_pembina }} |
                                        @if ($presens->status_kehadiran == 'Hadir')
                                            <span
                                                style="background-color:#28a745; padding:4px; border-radius:4px;color:white;">Hadir</span>
                                        @else
                                            <span
                                                style="background-color:#dc3545; padding:4px; border-radius:4px;color:white;">Tidak
                                                Hadir</span>
                                        @endif

                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center">Tidak ada presensi</p>
                    @endif

                </div>

            </div>

            <div class="title-content">
                <h2 class="title">Jadwal</h2>
                <a href="/mobile/jadwal" class="view-all">Lihat Semua</a>
            </div>
            <div class="product-wrapper">
                <div class="product-wrapper-content--4">
                    @foreach ($jadwal as $jdw)
                        <div id="single-product-item" class="single-product-item product-item--style-4">
                            <div>
                                <strong>{{ $jdw->tgl_kegiatan }} Ekstrakulikuler
                                    {{ $jdw->ekstrakulikuler->nama_ekstrakulikuler }}</strong><br>
                                <a href="single-product.html" class="title">
                                    Bertempat di {{ $jdw->tempat }} mulai
                                    {{ $jdw->jam_mulai }} WITA selesai {{ $jdw->jam_selesai }} WITA
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="title-content">
                <h2 class="title">Informasi</h2>
                <a href="/mobile/informasi" class="view-all">Lihat Semua</a>
            </div>
            <div class="product-wrapper">
                <div class="product-wrapper-content--4">
                    @foreach ($lomba as $lmb)
                        <div id="single-product-item" class="single-product-item product-item--style-4">
                            <a aria-label="Product Image" href="#" class="image">
                                <img width="90" height="90" class="img-fluid"
                                    src="{{ asset('/') }}{{ env('ASSET_UPLOAD') }}foto_lomba/{{ $lmb->foto_utama }}"
                                    alt="">
                            </a>
                            <div class="content">
                                <div class="content--left">
                                    <a href="#" class="title"><strong>{{ $lmb->judul_lomba }}</strong><br>
                                    </a>
                                    <p>
                                        Tempat : {{ $lmb->tempat }}<br>
                                        Tanggal : {{ $lmb->tgl_mulai }} s.d {{ $lmb->tgl_selesai }}
                                    </p>
                                </div>
                            </div>
                            <a href="#?" aria-label="Cart" class="cart-link"><i
                                    class="icon icon-carce-x-circle"></i></a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div><br><br>
    <!-- ...:::Start Catagories - 1 Section:::... -->
@endsection
