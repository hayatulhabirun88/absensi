@extends('web.template.content')

@section('title')
    Daftar Pendaftar
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Pendaftar</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-8">
                            <div class="mb-3">
                                <form action="{{ route('eskul.pendaftar.search') }}" method="get" id="searchForm">
                                    <input type="text" class="form-control" name="cari" id="searchInput"
                                        placeholder="Cari" value="{{ old('cari', request('cari')) }}" />
                                </form>
                            </div>

                        </div>
                        <div class="col-4">
                            <a type="submit" name="" id="" class="btn btn-primary float-right "
                                href="/eskul/pendaftar/create" role="button">Tambah</a>

                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Kelas</th>
                                    <th>TTL</th>
                                    <th>Alamat</th>
                                    <th>Hobi</th>
                                    <th>No HP</th>
                                    <th>Ekstrakulikuler</th>
                                    @if (auth()->user()->level == 'admin')
                                        <th width="150">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendaftar as $index => $pend)
                                    <tr>
                                        <td>{{ $index + $pendaftar->firstItem() }}</td>
                                        <td>{{ $pend->nama_lengkap }}</td>
                                        <td>{{ $pend->kelas }}</td>
                                        <td>{{ $pend->tempat_lahir }}, {{ $pend->tgl_lahir }}</td>
                                        <td>{{ $pend->alamat }}</td>
                                        <td>{{ $pend->hobi }}</td>
                                        <td>{{ $pend->no_hp }}</td>
                                        <td>{{ @$pend->ekstrakulikuler->nama_ekstrakulikuler }}</td>
                                        @if (auth()->user()->level == 'admin')
                                            <td>
                                                <a href="/eskul/pendaftar/{{ $pend->id }}/edit"
                                                    class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                                <form action="{{ route('eskul.pendaftardestroy', $pend->id) }}"
                                                    style="display:inline" method="POST"
                                                    id="deletePendaftarForm-{{ $pend->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger hapus-pendaftar-btn"
                                                        data-nama-pend="{{ $pend->nama_lengkap }}"
                                                        data-form-id="deletePendaftarForm-{{ $pend->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination justify-content-end ">
                        <ul class="pagination">
                            <li class="page-item {{ $pendaftar->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $pendaftar->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            @foreach ($pendaftar->getUrlRange(1, $pendaftar->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $pendaftar->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            <li class="page-item {{ $pendaftar->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $pendaftar->nextPageUrl() }}" aria-label="Next">
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


            $(".hapus-pendaftar-btn").click(function(e) {
                e.preventDefault();
                var formId = $(this).data('form-id');
                var pendaftarName = $(this).data('nama-pend');

                swal({
                    title: 'Apakah anda yakin?',
                    text: 'Akan menghapus pendaftar ' + pendaftarName + ' !',
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
