@extends('web.template.content')

@section('title')
    Daftar Gallery
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Gallery {{ $album->nama_album }} </h4>
                </div>
                <div class="card-body">
                    <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                        @foreach ($album->gallery as $albm)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <a href="{{ asset('/') }}{{ env('ASSET_UPLOAD') }}/foto/{{ $albm->foto }}"
                                    data-sub-html="Demo Description">
                                    <img class="img-responsive thumbnail"
                                        src="{{ asset('/') }}{{ env('ASSET_UPLOAD') }}/foto/{{ $albm->foto }}"
                                        alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link href="{{ asset('/') }}otika/assets/bundles/lightgallery/dist/css/lightgallery.css" rel="stylesheet">
@endpush

@push('script')
    <!-- JS Libraies -->
    <script src="{{ asset('/') }}otika/assets/bundles/lightgallery/dist/js/lightgallery-all.js"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('/') }}otika/assets/js/page/light-gallery.js"></script>
@endpush
