@extends('web.template.content')

@section('title', 'Kelas')

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Kelas</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-8">
                            <div class="mb-3">
                                <form action="/kelas" method="get" id="searchForm">
                                    <input type="text" class="form-control" name="cari" id="searchInput"
                                        placeholder="Cari" value="{{ Request::get('cari') }}" autofocus />
                                </form>
                            </div>

                        </div>
                        <div class="col-4">
                            <a type="submit" name="" id="" class="btn btn-primary float-right "
                                href="/kelas/create" role="button">Tambah</a>

                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Nama Kelas</th>
                                    <th>Program</th>
                                    <th>Jurusan</th>
                                    <th>Wali Kelas</th>
                                    <th>Tahun Ajaran</th>
                                    <th width="150">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelas as $index => $kls)
                                    <tr>
                                        <td>{{ $index + $kelas->firstItem() }}</td>
                                        <td>{{ $kls->nama_kelas }}</td>
                                        <td>{{ $kls->program }}</td>
                                        <td>{{ $kls->jurusan }}</td>
                                        <td>{{ $kls->wali_kelas }}</td>
                                        <td>{{ $kls->tahun_ajaran }}</td>
                                        <td>
                                            <a href="/kelas/{{ $kls->id }}/edit" class="btn btn-sm btn-warning"><i
                                                    class="far fa-edit"></i></a>
                                            <form action="{{ route('kelas.destroy', $kls->id) }}" style="display:inline"
                                                method="POST" id="deletekelasForm-{{ $kls->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger hapus-kelas-btn"
                                                    data-nama-kls="{{ $kls->nama_kelas }}"
                                                    data-form-id="deletekelasForm-{{ $kls->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $kelas->links('pagination::bootstrap-5') }}
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


            $(".hapus-kelas-btn").click(function(e) {
                e.preventDefault();
                var formId = $(this).data('form-id');
                var kelas = $(this).data('nama-kls');

                swal({
                    title: 'Apakah anda yakin?',
                    text: 'Akan menghapus Kelas ' + kelas + ' !',
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
