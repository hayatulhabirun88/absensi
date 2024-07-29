@extends('web.template.content')

@section('title')
    Presensi
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Presensi</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('presensi.simpan_sesi') }}" method="post">
                                @csrf

                                @if (auth()->user()->level == 'guru')
                                    <input type="hidden" value="{{ auth()->user()->guru->id }}" name="guru"
                                        id="guru">
                                @else
                                    <div class="mb-3">
                                        <label for="guru" class="form-label">Guru</label>
                                        <select class="form-control" name="guru" id="guru">
                                            <option selected>Pilih guru</option>
                                            @foreach ($guru as $pembn)
                                                <option value="{{ $pembn->id }}"
                                                    {{ session()->get('guru_id') == $pembn->id ? 'selected' : '' }}>
                                                    {{ $pembn->nama_guru }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label for="matapelajaran" class="form-label">Mata Pelajaran</label>
                                    <select class="form-control" name="matapelajaran" id="matapelajaran">
                                        <option selected>Pilih Mata Pelajaran</option>
                                        @foreach ($matapelajaran as $mpelajaran)
                                            <option value="{{ $mpelajaran->id }}"
                                                {{ session()->get('matapelajaran') == $mpelajaran->id ? 'selected' : '' }}>
                                                {{ $mpelajaran->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <select class="form-control" name="kelas" id="kelas">
                                        <option selected>Pilih Kelas</option>
                                        @foreach ($kelas as $kls)
                                            <option value="{{ $kls->id }}"
                                                {{ session()->get('kelas_id') == $kls->id ? 'selected' : '' }}>
                                                {{ $kls->nama_kelas }} {{ $kls->program }} {{ $kls->jurusan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_presensi" class="form-label">Tanggal Presensi</label>
                                    <input type="date" class="form-control" name="tgl_presensi" id="tgl_presensi"
                                        value="{{ session()->get('tgl_presensi') ?? date('Y-m-d') }}"
                                        placeholder="Tanggal Presensi" />
                                </div>
                                <input type="submit" value="Mulai Absen" class="btn btn-primary">
                                <br><br>
                            </form>
                        </div>
                    </div>
                    @if (session()->get('matapelajaran') && session()->get('tgl_presensi'))
                        <div class="alert alert-success mb-3" width="100%">Absen
                            {{ @\App\Models\Mata_pelajaran::find(session()->get('matapelajaran'))->nama }} pada tanggal
                            {{ session()->get('tgl_presensi') }} oleh
                            {{ @\App\Models\Guru::find(session()->get('guru_id'))->nama_guru }} di Kelas
                            {{ @\App\Models\Kelas::find(session()->get('kelas_id'))->nama_kelas }}
                            {{ @\App\Models\Kelas::find(session()->get('kelas_id'))->program }}
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th width="50">No</th>
                                        <th width="50">Sts</th>
                                        <th>Nama Lengkap/Kelas</th>
                                        <th>Tahun Ajaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa as $index => $sws)
                                        @php
                                            $riwayatpresensi = \App\Models\Presensi::where('siswa_id', $sws->id)
                                                ->where('mata_pelajaran_id', session()->get('matapelajaran'))
                                                ->where('guru_id', session()->get('guru_id'))
                                                ->where('kelas_id', session()->get('kelas_id'))
                                                ->where('tanggal', session()->get('tgl_presensi'))
                                                ->first();
                                        @endphp
                                        <tr>
                                            <td>{{ $index + $siswa->firstItem() }}</td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="status_kehadiran{{ $sws->id }}" value="Hadir"
                                                            id="hadir_{{ $sws->id }}"
                                                            {{ @$riwayatpresensi->status == 'Hadir' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="hadir_{{ $sws->id }}">
                                                            H
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="status_kehadiran{{ $sws->id }}" value="Terlambat"
                                                            id="terlambat_{{ $sws->id }}"
                                                            {{ @$riwayatpresensi->status == 'Terlambat' ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="terlambat_{{ $sws->id }}">
                                                            T
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="status_kehadiran{{ $sws->id }}" value="Sakit"
                                                            id="sakit_{{ $sws->id }}"
                                                            {{ @$riwayatpresensi->status == 'Sakit' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="sakit_{{ $sws->id }}">
                                                            S
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="status_kehadiran{{ $sws->id }}" value="Izin"
                                                            id="izin_{{ $sws->id }}"
                                                            {{ @$riwayatpresensi->status == 'Izin' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="izin_{{ $sws->id }}">
                                                            I
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="status_kehadiran{{ $sws->id }}" value="Alpa"
                                                            id="alpa_{{ $sws->id }}"
                                                            {{ @$riwayatpresensi->status == 'Alpa' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="alpa_{{ $sws->id }}">
                                                            A
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $sws->nama }} <br>{{ $sws->kelas->nama_kelas }}
                                                {{ $sws->kelas->program }} {{ $sws->kelas->jurusan }}<br>
                                                @if ($riwayatpresensi)
                                                    @if ($riwayatpresensi->status == 'Hadir')
                                                        <span id="riwayat_presensi-{{ $sws->id }}"
                                                            class="badge badge-success">{{ $riwayatpresensi->status }}
                                                        </span>
                                                    @elseif ($riwayatpresensi->status == 'Alpa')
                                                        <span id="riwayat_presensi-{{ $sws->id }}"
                                                            class="badge badge-danger">{{ $riwayatpresensi->status }}
                                                        </span>
                                                    @else
                                                        <span id="riwayat_presensi-{{ $sws->id }}"
                                                            class="badge badge-warning">{{ $riwayatpresensi->status }}
                                                        </span>
                                                    @endif
                                                @else
                                                    <span id="riwayat_presensi-{{ $sws->id }}"
                                                        class="badge badge-light">Belum Absen</span>
                                                @endif

                                            </td>
                                            <td>{{ $sws->kelas->tahun_ajaran }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $siswa->links('pagination::bootstrap-5') }}
                    @endif

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


            $('input[type="radio"]').on('change', function() {
                let id = $(this).attr('name').replace('status_kehadiran', '');
                let status = $(this).val();
                $.ajax({
                    url: '/presensi/ajax-update-presensi', // Your endpoint to handle the request
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        siswa_id: id,
                        status: status,
                    },
                    success: function(response) {
                        console.log('#riwayat_presensi' + response.siswa_id)
                        iziToast.success({
                            title: 'Sukses!',
                            message: `'${response.message}'`,
                            position: 'topRight'
                        });

                        // Update status di elemen dengan ID 'riwayat_presensi'
                        $('#riwayat_presensi-' + response.siswa_id).removeClass().addClass(
                            'badge');

                        if (response.status_kehadiran === 'Hadir') {
                            $('#riwayat_presensi-' + response.siswa_id).addClass(
                                'badge-success').text(response.status_kehadiran);
                        } else if (response.status_kehadiran === 'Alpa') {
                            $('#riwayat_presensi-' + response.siswa_id).addClass('badge-danger')
                                .text(response.status_kehadiran);
                        } else {
                            $('#riwayat_presensi-' + response.siswa_id).addClass(
                                'badge-warning').text(response.status_kehadiran);
                        }

                    },
                    error: function(xhr, status, error) {
                        swal('Error', 'Periksa Kembali Inputan Anda!', 'error');
                    }
                });
            });

            $('#ekstrakulikuler').on('change', function() {
                var eskulId = $(this).val();
                if (eskulId) {
                    window.location.href = '/presensi?ekstrakulikuler=' + eskulId;
                }
            });

        });
    </script>
@endpush
