@extends('web.template.content')

@section('title')
    Kategori Ekstrakulikuler
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Ekstrakulikuler</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-8">
                            <div class="mb-3">
                                <form action="{{ route('eskul.kategori.search') }}" method="get" id="searchForm">
                                    <input type="text" class="form-control" name="cari" id="searchInput"
                                        placeholder="Cari" />
                                </form>
                            </div>

                        </div>
                        <div class="col-4">
                            <a type="submit" name="" id="" class="btn btn-primary float-right "
                                href="/eskul/kategori/create" role="button">Tambah</a>

                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th width="50">#</th>
                                    <th>Name</th>
                                    <th width="150">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($eskulkategori as $index => $eskul)
                                    <tr>
                                        <td>{{ $index + $eskulkategori->firstItem() }}</td>
                                        <td>{{ $eskul->nama_ekstrakulikuler }}</td>
                                        <td>
                                            <a href="/eskul/kategori/{{ $eskul->id }}/edit"
                                                class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                            <form action="{{ route('eskul.kategoridestroy', $eskul->id) }}"
                                                style="display:inline" method="POST"
                                                id="deleteEskulForm-{{ $eskul->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger hapus-eskul-btn"
                                                    data-nama-eskul="{{ $eskul->nama_ekstrakulikuler }}"
                                                    data-form-id="deleteEskulForm-{{ $eskul->id }}">
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
                            <li class="page-item {{ $eskulkategori->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $eskulkategori->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            @foreach ($eskulkategori->getUrlRange(1, $eskulkategori->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $eskulkategori->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            <li class="page-item {{ $eskulkategori->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $eskulkategori->nextPageUrl() }}" aria-label="Next">
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


            $(".hapus-eskul-btn").click(function(e) {
                e.preventDefault();
                var formId = $(this).data('form-id');
                var eskulName = $(this).data('nama-eskul');

                swal({
                    title: 'Apakah anda yakin?',
                    text: 'Akan menghapus eskul ' + eskulName + ' !',
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
