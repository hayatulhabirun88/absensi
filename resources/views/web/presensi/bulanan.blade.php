@extends('web.template.content')

@section('title')
    Laporan Presensi Bulanan
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Laporan Presensi Bulanan</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ url('/export-laporan-bulanan') }}" method="GET">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="jenis_laporan" class="form-label">Jenis Laporan</label>
                                            <select class="form-control" name="jenis_laporan" id="jenis_laporan">
                                                <option value="">Pilih Jenis Laporan</option>
                                                <option value="rekap_absensi_bulanan">Rekap Absensi Bulanan</option>
                                                <option value="daftar_hadir_bulanan">Daftar Hadir Bulanan</option>
                                            </select>
                                            @error('jenis_laporan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="kelas" class="form-label">Kelas</label>
                                            <select class="form-control" name="kelas" id="kelas">
                                                <option value="">Pilih Kelas</option>
                                                @foreach ($kelas as $kelasItem)
                                                    <option value="{{ $kelasItem->id }}">
                                                        {{ $kelasItem->nama_kelas }} {{ $kelasItem->program }}
                                                        {{ $kelasItem->jurusan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kelas')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @if (auth()->user()->level == 'admin')
                                            <div class="mb-3">
                                                <label for="guru" class="form-label">Guru</label>
                                                <select class="form-control" name="guru" id="guru">
                                                    <option value="">Pilih Guru</option>
                                                    @foreach ($guru as $guru)
                                                        <option value="{{ $guru->id }}">
                                                            {{ $guru->nama_guru }} | {{ $guru->nip }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('guru')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @else
                                            <input type="hidden" name="guru" value="{{ auth()->user()->guru->id }}">
                                        @endif

                                        <div class="mb-3">
                                            <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                                            <select class="form-control" name="mata_pelajaran" id="mata_pelajaran">
                                                <option value="">Pilih Mata Pelajaran</option>
                                                @foreach ($matapelajaran as $matapljr)
                                                    <option value="{{ $matapljr->id }}">
                                                        {{ $matapljr->kode }} | {{ $matapljr->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('mata_pelajaran')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="tahun" class="form-label">Tahun Pelajaran</label>
                                            <select class="form-control" name="tahun" id="tahun">
                                                <option value="">Pilih Tahun Pelajaran</option>
                                                @for ($i = 0; $i < 3; $i++)
                                                    @php
                                                        $tahun_awal = date('Y') - $i;
                                                        $tahun_akhir = $tahun_awal + 1;
                                                    @endphp
                                                    <option value="{{ $tahun_awal }}/{{ $tahun_akhir }}">
                                                        {{ $tahun_awal }}/{{ $tahun_akhir }}
                                                    </option>
                                                @endfor
                                            </select>
                                            @error('tahun')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="bulan" class="form-label">Pilih Bulan</label>
                                            <select class="form-control" name="bulan" id="bulan">
                                                <option value="">Pilih Bulan</option>
                                                @php
                                                    $namaBulan = [
                                                        '01' => 'Januari',
                                                        '02' => 'Februari',
                                                        '03' => 'Maret',
                                                        '04' => 'April',
                                                        '05' => 'Mei',
                                                        '06' => 'Juni',
                                                        '07' => 'Juli',
                                                        '08' => 'Agustus',
                                                        '09' => 'September',
                                                        '10' => 'Oktober',
                                                        '11' => 'November',
                                                        '12' => 'Desember',
                                                    ];
                                                @endphp
                                                @foreach ($namaBulan as $key => $bulan)
                                                    <option value="{{ $key }}">{{ $bulan }}</option>
                                                @endforeach
                                            </select>
                                            @error('bulan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-success mt-4">Export</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
