@extends('web.template.content')

@section('title')
    Laporan Presensi
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Laporan Presensi</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ url('/presensi/filter-laporan') }}" method="get">
                                <div class="mb-3">
                                    <label for="ekstrakulikuler" class="form-label">Ekstrakulikuler</label>
                                    <select class="form-control" name="ekstrakulikuler" id="ekstrakulikuler">
                                        <option value="">Pilih Ekstrakulikuler</option>
                                        @foreach ($ekstrakulikuler as $eskul)
                                            <option value="{{ $eskul->id }}"
                                                {{ Request::input('ekstrakulikuler') == $eskul->id ? 'selected' : '' }}>
                                                {{ $eskul->nama_ekstrakulikuler }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pembina" class="form-label">Pembina</label>
                                    <select class="form-control" name="pembina" id="pembina">
                                        <option value="">Pilih Pembina</option>
                                        @foreach ($pembina as $pembn)
                                            <option value="{{ $pembn->id }}"
                                                {{ Request::input('pembina') == $pembn->id ? 'selected' : '' }}>
                                                {{ $pembn->nama_pembina }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_awal" class="form-label">Tanggal Awal</label>
                                    <input type="date" class="form-control" name="tgl_awal" id="tgl_awal"
                                        placeholder="Tanggal Awal" value="{{ Request::input('tgl_awal') }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_akhir" class="form-label">Tanggal Akhir</label>
                                    <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir"
                                        placeholder="Tanggal Akhir" value="{{ Request::input('tgl_akhir') }}" />
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        Filter
                                    </button>
                                    <a href="/presensi/laporan/all" class="btn btn-success">
                                        Tampil Semua
                                    </a>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Lengkap</th>
                                    <th>Kelas</th>
                                    <th>No HP</th>
                                    <th width="150">Status Kehadiran</th>
                                    <th>Ekstrakulikuler</th>
                                    <th>Pembina</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($presensi as $index => $press)
                                    <tr>
                                        <td>{{ $index + $presensi->firstItem() }}</td>
                                        <td>{{ @$press->tgl_presensi }}</td>
                                        <td>{{ @$press->pendaftar->nama_lengkap }}</td>
                                        <td>{{ @$press->pendaftar->kelas }}</td>
                                        <td>{{ @$press->pendaftar->no_hp }}</td>
                                        <td>{{ @$press->status_kehadiran }}</td>
                                        <td>{{ @$press->pembina->nama_pembina }}</td>
                                        <td>{{ @$press->pendaftar->ekstrakulikuler->nama_ekstrakulikuler }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination justify-content-end ">
                        <ul class="pagination">
                            <li class="page-item {{ $presensi->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $presensi->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            @foreach ($presensi->getUrlRange(1, $presensi->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $presensi->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            <li class="page-item {{ $presensi->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $presensi->nextPageUrl() }}" aria-label="Next">
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
    <link rel="stylesheet" href="{{ asset('') }}otika/assets/bundles/izitoast/css/iziToast.min.css">
@endpush

@push('script')
    <!-- JS Libraies -->
    <script src="{{ asset('') }}otika/assets/bundles/sweetalert/sweetalert.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('') }}otika/assets/js/page/sweetalert.js"></script>

    <script src="{{ asset('') }}otika/assets/bundles/izitoast/js/iziToast.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('') }}otika/assets/js/page/toastr.js"></script>

    <script>
        $(document).ready(function() {

            $('#searchInput').keypress(function(e) {
                // Check if the key pressed is Enter (keyCode 13)
                if (e.which == 13) {
                    e.preventDefault(); // Prevent the default action (form submission)
                    $('#searchForm').submit(); // Submit the form
                }
            });
        });
    </script>
@endpush
