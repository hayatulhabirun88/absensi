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
                            <div class="mb-3">
                                <label for="ekstrakulikuler" class="form-label">Ekstrakulikuler</label>
                                <select class="form-control" name="ekstrakulikuler" id="ekstrakulikuler">
                                    <option selected>Pilih Ekstrakulikuler</option>
                                    @foreach ($ekstrakulikuler as $eskul)
                                        <option value="{{ $eskul->id }}"
                                            {{ Request::input('ekstrakulikuler') == $eskul->id ? 'selected' : '' }}>
                                            {{ $eskul->nama_ekstrakulikuler }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if (auth()->user()->level == 'pembina')
                                <input type="hidden" value="{{ auth()->user()->pembina->id }}" name="pembina"
                                    id="pembina">
                            @else
                                <div class="mb-3">
                                    <label for="pembina" class="form-label">Pembina</label>
                                    <select class="form-control" name="pembina" id="pembina">
                                        <option selected>Pilih Pembina</option>
                                        @foreach ($pembina as $pembn)
                                            <option value="{{ $pembn->id }}">{{ $pembn->nama_pembina }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="mb-3">
                                <label for="tgl_presensi" class="form-label">Tanggal Presensi</label>
                                <input type="date" class="form-control" name="tgl_presensi" id="tgl_presensi"
                                    value="{{ date('Y-m-d') }}" placeholder="Tanggal Presensi" />
                            </div>

                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Kelas</th>
                                    <th>No HP</th>
                                    <th width="150">Status Kehadiran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendaftar as $index => $pend)
                                    <tr>
                                        <td>{{ $index + $pendaftar->firstItem() }}</td>
                                        <td>{{ $pend->nama_lengkap }}</td>
                                        <td>{{ $pend->kelas }}</td>
                                        <td>{{ $pend->no_hp }}</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="status_kehadiran{{ $pend->id }}" value="Hadir"
                                                        id="hadir_{{ $pend->id }}">
                                                    <label class="form-check-label" for="hadir_{{ $pend->id }}">
                                                        Hadir
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="status_kehadiran{{ $pend->id }}" value="Tidak Hadir"
                                                        id="tidak_hadir_{{ $pend->id }}">
                                                    <label class="form-check-label" for="tidak_hadir_{{ $pend->id }}">
                                                        Tidak Hadir
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
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

            $('input[type="radio"]').on('change', function() {
                let id = $(this).attr('name').replace('status_kehadiran', '');
                let status = $(this).val();
                let pembina_id = $("#pembina").val();
                let ekstrakulikuler_id = $("#ekstrakulikuler").val();
                let tgl_presensi = $("#tgl_presensi").val();

                $.ajax({
                    url: '/presensi/ajax-update-presensi', // Your endpoint to handle the request
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        pendaftar_id: id,
                        status_kehadiran: status,
                        pembina_id: pembina_id,
                        ekstrakulikuler_id: ekstrakulikuler_id,
                        tgl_presensi: tgl_presensi
                    },
                    success: function(response) {
                        iziToast.success({
                            title: 'Sukses!',
                            message: 'Presensi berhasil di tambahkan!',
                            position: 'topRight'
                        });
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
