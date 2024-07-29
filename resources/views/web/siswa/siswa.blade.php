@extends('web.template.content')

@section('title', 'Siswa')

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Siswa</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-8">
                            <div class="mb-3">
                                <form action="/siswa" method="get" id="searchForm">
                                    <input type="text" class="form-control" name="cari" id="searchInput"
                                        value="{{ Request::get('cari') }}" placeholder="Cari" autofocus />
                                </form>
                            </div>

                        </div>
                        <div class="col-4">

                            <a type="submit" name="" id="" class="btn btn-success float-right "
                                href="/import-data-view" role="button">Import Data Siswa</a>
                            &nbsp;&nbsp;
                            <a type="submit" name="" id="" class="btn btn-primary float-right "
                                href="/siswa/create" role="button">Tambah</a>
                        </div>

                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Nama Siswa</th>
                                    <th>NIS</th>
                                    <th>Kelas</th>
                                    <th>Tahun Ajaran</th>
                                    <th width="150">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $index => $sws)
                                    <tr>
                                        <td>{{ $index + $siswa->firstItem() }}</td>
                                        <td>{{ $sws->nama }}</td>
                                        <td>{{ $sws->nis }}</td>
                                        <td>{{ @$sws->kelas->nama_kelas }} {{ @$sws->kelas->program }}
                                            {{ @$sws->kelas->jurusan }}</td>
                                        <td>{{ @$sws->kelas->tahun_ajaran }}</td>
                                        <td>
                                            <a href="/siswa/{{ $sws->id }}/edit" class="btn btn-sm btn-warning"><i
                                                    class="far fa-edit"></i></a>
                                            <form action="{{ route('siswa.destroy', $sws->id) }}" style="display:inline"
                                                method="POST" id="deletesiswaForm-{{ $sws->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger hapus-siswa-btn"
                                                    data-nama-sws="{{ $sws->nama_siswa }}"
                                                    data-form-id="deletesiswaForm-{{ $sws->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $siswa->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

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


            $(".hapus-siswa-btn").click(function(e) {
                e.preventDefault();
                var formId = $(this).data('form-id');
                var siswa = $(this).data('nama-sws');

                swal({
                    title: 'Apakah anda yakin?',
                    text: 'Akan menghapus Siswa ' + siswa + ' !',
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
