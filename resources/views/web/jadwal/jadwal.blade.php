@extends('web.template.content')

@section('title')
    Daftar Jadwal
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Jadwal</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-8">
                            <div class="mb-3">
                                <form action="{{ route('eskul.jadwal.search') }}" method="get" id="searchForm">
                                    <input type="text" class="form-control" name="cari" id="searchInput"
                                        placeholder="Cari" />
                                </form>
                            </div>

                        </div>
                        <div class="col-4">
                            <a type="submit" name="" id="" class="btn btn-primary float-right "
                                href="/eskul/jadwal/create" role="button">Tambah</a>

                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Ekstrakulikuler</th>
                                    <th>Pembina</th>
                                    <th>Tempat</th>
                                    <th>Tanggal</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th width="150">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwal as $index => $jdw)
                                    <tr>
                                        <td>{{ $index + $jadwal->firstItem() }}</td>
                                        <td>{{ $jdw->ekstrakulikuler->nama_ekstrakulikuler }}</td>
                                        <td>{{ $jdw->pembina->nama_pembina }}</td>
                                        <td>{{ $jdw->tempat }}</td>
                                        <td>{{ $jdw->tgl_kegiatan }}</td>
                                        <td>{{ $jdw->jam_mulai }}</td>
                                        <td>{{ $jdw->jam_selesai }}</td>
                                        </td>
                                        <td>
                                            <a href="/eskul/jadwal/{{ $jdw->id }}/edit"
                                                class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                            <form action="{{ route('eskul.jadwaldestroy', $jdw->id) }}"
                                                style="display:inline" method="POST"
                                                id="deletejadwalForm-{{ $jdw->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger hapus-jadwal-btn"
                                                    data-nama-jdw="{{ $jdw->ekstrakulikuler->nama_ekstrakulikuler }}"
                                                    data-form-id="deletejadwalForm-{{ $jdw->id }}">
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
                            <li class="page-item {{ $jadwal->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $jadwal->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            @foreach ($jadwal->getUrlRange(1, $jadwal->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $jadwal->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            <li class="page-item {{ $jadwal->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $jadwal->nextPageUrl() }}" aria-label="Next">
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


            $(".hapus-jadwal-btn").click(function(e) {
                e.preventDefault();
                var formId = $(this).data('form-id');
                var jadwalName = $(this).data('nama-jdw');

                swal({
                    title: 'Apakah anda yakin?',
                    text: 'Akan menghapus jadwal ekstrakulikuler ' + jadwalName + ' !',
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
