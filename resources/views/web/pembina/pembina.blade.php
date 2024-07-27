@extends('web.template.content')

@section('title')
    Daftar Pembina
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Pembina</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-8">
                            <div class="mb-3">
                                <form action="{{ route('pembina.search') }}" method="get" id="searchForm">
                                    <input type="text" class="form-control" name="cari" id="searchInput"
                                        placeholder="Cari" />
                                </form>
                            </div>

                        </div>
                        <div class="col-4">
                            <a type="submit" name="" id="" class="btn btn-primary float-right "
                                href="/pembina/create" role="button">Tambah</a>

                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Nama Pembina</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th width="150">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembina as $index => $pemb)
                                    <tr>
                                        <td>{{ $index + $pembina->firstItem() }}</td>
                                        <td>{{ $pemb->nama_pembina }}</td>
                                        <td>{{ $pemb->user->email }}</td>
                                        <td>{{ $pemb->alamat }}</td>
                                        <td>{{ $pemb->no_hp }}</td>
                                        </td>
                                        <td>
                                            <a href="/pembina/{{ $pemb->id }}/edit" class="btn btn-sm btn-warning"><i
                                                    class="far fa-edit"></i></a>
                                            <form action="{{ route('pembinadestroy', $pemb->id) }}" style="display:inline"
                                                method="POST" id="deletepembinaForm-{{ $pemb->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger hapus-pembina-btn"
                                                    data-nama-pemb="{{ $pemb->nama_pembina }}"
                                                    data-form-id="deletepembinaForm-{{ $pemb->id }}">
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
                            <li class="page-item {{ $pembina->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $pembina->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            @foreach ($pembina->getUrlRange(1, $pembina->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $pembina->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            <li class="page-item {{ $pembina->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $pembina->nextPageUrl() }}" aria-label="Next">
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


            $(".hapus-pembina-btn").click(function(e) {
                e.preventDefault();
                var formId = $(this).data('form-id');
                var pembinaName = $(this).data('nama-pemb');

                swal({
                    title: 'Apakah anda yakin?',
                    text: 'Akan menghapus pembina ' + pembinaName + ' !',
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
