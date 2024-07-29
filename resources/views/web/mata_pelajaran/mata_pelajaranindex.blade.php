@extends('web.template.content')

@section('title', 'Mata Pelajaran')


@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Mata Pelajaran</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-8">
                            <div class="mb-3">
                                <form action="/mata-pelajaran" method="get" id="searchForm">
                                    <input type="text" class="form-control" name="cari" id="searchInput"
                                        placeholder="Cari" value="{{ Request::get('cari') }}" autofocus />
                                </form>
                            </div>

                        </div>
                        <div class="col-4">
                            <a type="submit" name="" id="" class="btn btn-primary float-right "
                                href="/mata-pelajaran/create" role="button">Tambah</a>

                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Kode Mata Pelajaran</th>
                                    <th width="150">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mata_pelajaran as $index => $mtl)
                                    <tr>
                                        <td>{{ $index + $mata_pelajaran->firstItem() }}</td>
                                        <td>{{ $mtl->nama }}</td>
                                        <td>{{ $mtl->kode }}</td>
                                        <td>
                                            <a href="/mata-pelajaran/{{ $mtl->id }}/edit"
                                                class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                            <form action="{{ route('mata-pelajaran.destroy', $mtl->id) }}"
                                                style="display:inline" method="POST"
                                                id="deletemata_pelajaranForm-{{ $mtl->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-sm btn-danger hapus-mata_pelajaran-btn"
                                                    data-nama-mtl="{{ $mtl->name }}"
                                                    data-form-id="deletemata_pelajaranForm-{{ $mtl->id }}">
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
                            <li class="page-item {{ $mata_pelajaran->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $mata_pelajaran->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            @foreach ($mata_pelajaran->getUrlRange(1, $mata_pelajaran->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $mata_pelajaran->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            <li class="page-item {{ $mata_pelajaran->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $mata_pelajaran->nextPageUrl() }}" aria-label="Next">
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


            $(".hapus-mata_pelajaran-btn").click(function(e) {
                e.preventDefault();
                var formId = $(this).data('form-id');
                var mataPelajaran = $(this).data('nama-mtl');

                swal({
                    title: 'Apakah anda yakin?',
                    text: 'Akan menghapus Mata Pelajaran ' + mataPelajaran + ' !',
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
