@extends('web.template.content')

@section('title')
    Daftar Lomba
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Lomba</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-8">
                            <div class="mb-3">
                                <form action="{{ route('eskul.lomba.search') }}" method="get" id="searchForm">
                                    <input type="text" class="form-control" name="cari" id="searchInput"
                                        placeholder="Cari" />
                                </form>
                            </div>

                        </div>
                        <div class="col-4">
                            <a type="submit" name="" id="" class="btn btn-primary float-right "
                                href="/eskul/lomba/create" role="button">Tambah</a>

                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Judul</th>
                                    <th>Tempat</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Deskripsi</th>
                                    <th>Foto</th>
                                    <th width="150">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lomba as $index => $lmb)
                                    <tr>
                                        <td>{{ $index + $lomba->firstItem() }}</td>
                                        <td>{{ $lmb->judul_lomba }}</td>
                                        <td>{{ $lmb->tempat }}</td>
                                        <td>{{ $lmb->tgl_mulai }}</td>
                                        <td>{{ $lmb->tgl_selesai }}</td>
                                        <td>{{ $lmb->deskripsi }}</td>
                                        <td><img width="50"
                                                src="{{ asset('/') }}{{ env('ASSET_UPLOAD') }}/foto_lomba/{{ $lmb->foto_utama }}"
                                                alt="">
                                        </td>
                                        <td>
                                            <a href="/eskul/lomba/{{ $lmb->id }}/edit"
                                                class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                            <form action="{{ route('eskul.lombadestroy', $lmb->id) }}"
                                                style="display:inline" method="POST"
                                                id="deletelombaForm-{{ $lmb->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger hapus-lomba-btn"
                                                    data-nama-lmb="{{ $lmb->judul_lomba }}"
                                                    data-form-id="deletelombaForm-{{ $lmb->id }}">
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
                            <li class="page-item {{ $lomba->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $lomba->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            @foreach ($lomba->getUrlRange(1, $lomba->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $lomba->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            <li class="page-item {{ $lomba->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $lomba->nextPageUrl() }}" aria-label="Next">
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


            $(".hapus-lomba-btn").click(function(e) {
                e.preventDefault();
                var formId = $(this).data('form-id');
                var lombaName = $(this).data('nama-lmb');

                swal({
                    title: 'Apakah anda yakin?',
                    text: 'Akan menghapus lomba ' + lombaName + ' !',
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
