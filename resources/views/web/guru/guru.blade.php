@extends('web.template.content')

@section('title', 'Guru')

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Guru</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-8">
                            <div class="mb-3">
                                <form action="/guru" method="get" id="searchForm">
                                    <input type="text" class="form-control" name="cari" id="searchInput"
                                        placeholder="Cari" value="{{ Request::get('cari') }}" autofocus />
                                </form>
                            </div>

                        </div>
                        <div class="col-4">
                            <a type="submit" name="" id="" class="btn btn-primary float-right "
                                href="/guru/create" role="button">Tambah</a>

                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>NIP</th>
                                    <th>Nama Guru</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th width="150">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guru as $index => $gr)
                                    <tr>
                                        <td>{{ $index + $guru->firstItem() }}</td>
                                        <td>{{ $gr->nip }}</td>
                                        <td>{{ $gr->nama_guru }}</td>
                                        <td>{{ $gr->matapelajaran }}</td>
                                        <td>{{ $gr->alamat }}</td>
                                        <td>{{ $gr->no_hp }}</td>
                                        <td>
                                            <a href="/guru/{{ $gr->id }}/edit" class="btn btn-sm btn-warning"><i
                                                    class="far fa-edit"></i></a>
                                            <form action="{{ route('guru.destroy', $gr->id) }}" style="display:inline"
                                                method="POST" id="deleteguruForm-{{ $gr->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger hapus-guru-btn"
                                                    data-nama-gr="{{ $gr->nama_guru }}"
                                                    data-form-id="deleteguruForm-{{ $gr->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $guru->links('pagination::bootstrap-5') }}
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


            $(".hapus-guru-btn").click(function(e) {
                e.preventDefault();
                var formId = $(this).data('form-id');
                var guru = $(this).data('nama-gr');

                swal({
                    title: 'Apakah anda yakin?',
                    text: 'Akan menghapus guru ' + guru + ' !',
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
