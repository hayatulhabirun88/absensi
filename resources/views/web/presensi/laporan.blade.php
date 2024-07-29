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
                            <form action="{{ url('/presensi-filter-laporan') }}" method="GET">
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="kelas" class="form-label">Kelas</label>
                                        <select class="form-control" name="kelas" id="kelas">
                                            <option value="">Pilih Kelas</option>
                                            @foreach ($kelas as $kelasItem)
                                                <option value="{{ $kelasItem->id }}"
                                                    {{ Request::input('kelas') == $kelasItem->id ? 'selected' : '' }}>
                                                    {{ $kelasItem->nama_kelas }} {{ $kelasItem->program }}
                                                    {{ $kelasItem->jurusan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="tgl_awal" class="form-label">Tanggal Awal</label>
                                        <input type="date" class="form-control" name="tgl_awal" id="tgl_awal"
                                            value="{{ Request::input('tgl_awal') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="tgl_akhir" class="form-label">Tanggal Akhir</label>
                                        <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir"
                                            value="{{ Request::input('tgl_akhir') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary mt-4">Filter</button>
                                        <a href="/presensi-filter-laporan" class="btn btn-info mt-4">Tampil Semua</a>
                                        <a href="{{ route('presensi.exportLaporan') }}" class="btn btn-success mt-4">Export
                                            to
                                            Excel</a>
                                    </div>
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
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th width="150">Status Kehadiran</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Guru</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($presensi as $index => $press)
                                    <tr>
                                        <td>{{ $index + $presensi->firstItem() }}</td>
                                        <td>{{ @$press->tanggal }}</td>
                                        <td>{{ @$press->siswa->nama }}</td>
                                        <td>{{ @$press->siswa->kelas->nama_kelas }} {{ @$press->siswa->kelas->program }}
                                            {{ @$press->siswa->kelas->jurusan }}</td>
                                        <td>
                                            @if ($press->status == 'Hadir')
                                                <span class="badge badge-success">{{ $press->status }}
                                                </span>
                                            @elseif ($press->status == 'Alpa')
                                                <span class="badge badge-danger">{{ $press->status }}
                                                </span>
                                            @else
                                                <span class="badge badge-warning">{{ $press->status }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ @$press->mataPelajaran->nama }}</td>
                                        <td>{{ @$press->guru->nama_guru }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $presensi->appends([
                            'kelas' => session('filter.kelas'),
                            'tgl_awal' => session('filter.tgl_awal'),
                            'tgl_akhir' => session('filter.tgl_akhir'),
                        ])->links('pagination::bootstrap-5') }}
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
