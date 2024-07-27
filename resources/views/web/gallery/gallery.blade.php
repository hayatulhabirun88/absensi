@extends('web.template.content')

@section('title')
    Daftar gallery
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar gallery</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-8">
                            <div class="mb-3">
                                <form action="{{ route('eskul.gallery.search') }}" method="get" id="searchForm">
                                    <input type="text" class="form-control" name="cari" id="searchInput"
                                        placeholder="Cari" />
                                </form>
                            </div>

                        </div>
                        <div class="col-4">
                            <a type="submit" name="" id="" class="btn btn-primary float-right "
                                href="/eskul/gallery/create" role="button">Tambah</a>

                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Nama Album</th>
                                    <th>Lihat Album</th>
                                    <th>Tanggal Dibuat</th>
                                    <th width="150">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gallery as $index => $glr)
                                    <tr>
                                        <td>{{ $index + $gallery->firstItem() }}</td>
                                        <td>{{ $glr->nama_album }}</td>
                                        <td><a href="/eskul/gallery/{{ $glr->id }}"
                                                class="btn btn-sm btn-success">Lihat</a>
                                        </td>
                                        <td>{{ $glr->created_at }}</td>
                                        <td>
                                            <a href="/eskul/gallery/{{ $glr->id }}/edit"
                                                class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                            <form action="{{ route('eskul.gallerydestroy', $glr->id) }}"
                                                style="display:inline" method="POST"
                                                id="deletegalleryForm-{{ $glr->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger hapus-gallery-btn"
                                                    data-nama-glr="{{ $glr->nama_album }}"
                                                    data-form-id="deletegalleryForm-{{ $glr->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination justify-content-end ">
                        <ul class="pagination">
                            <li class="page-item {{ $gallery->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $gallery->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            @foreach ($gallery->getUrlRange(1, $gallery->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $gallery->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            <li class="page-item {{ $gallery->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $gallery->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
@endpush

@push('script')
    <!-- JS Libraies -->
    <script src="{{ asset('') }}otika/assets/bundles/sweetalert/sweetalert.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('') }}otika/assets/js/page/sweetalert.js"></script>

    <script>
        $(document).ready(function() {

            $('#searchInput').keypress(function(e) {
                // Check if the key pressed is Enter (keyCode 13)
                if (e.which == 13) {
                    e.preventDefault(); // Prevent the default action (form submission)
                    $('#searchForm').submit(); // Submit the form
                }
            });


            $(".hapus-gallery-btn").click(function(e) {
                e.preventDefault();
                var formId = $(this).data('form-id');
                var galleryName = $(this).data('nama-glr');

                swal({
                    title: 'Apakah anda yakin?',
                    text: 'Akan menghapus gallery ' + galleryName + ' !',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $("#" + formId).submit();
                    }
                });
            });

        });
    </script>
@endpush
