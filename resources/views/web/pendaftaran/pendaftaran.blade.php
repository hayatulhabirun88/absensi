@extends('web.template.content')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Halaman /</span> Pendaftaran</h4>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="row">
                <div class="col-md-9">
                    <h5 class="card-header">Pendaftaran</h5>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="mb-3">
                        <select class="form-select form-select" name="cari" id="cari">
                            <option>-- Cari Pendaftar --</option>
                            <option value="pemilik_kost" {{ Request::segment(2) == 'pemilik_kost' ? 'selected' : '' }}>
                                Pemilik</option>
                            <option value="penyewa" {{ Request::segment(2) == 'penyewa' ? 'selected' : '' }}>Pengguna
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Telp</th>
                            <th>Dokumentasi KTP</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if (count($pendaftaran) > 0)
                            @foreach ($pendaftaran as $index => $pend)
                                <tr>
                                    <td>{{ $index + $pendaftaran->firstItem() }}</td>
                                    <td>{{ $pend->name }}</td>
                                    <td>{{ $pend->no_tlp }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#dokktpModal{{ $pend->id }}">
                                            Lihat KTP
                                        </button>
                                    </td>
                                    <td>
                                        @if ($pend->level == 'pemilik_kost')
                                            <span class="badge bg-label-primary me-1">Pemilik</span>
                                        @else
                                            <span class="badge bg-label-info me-1">Pengguna</span>
                                        @endif
                                    </td>
                                    <td><a href="/pendaftaran/{{ $pend->id }}/edit" class="btn btn-sm btn-warning"><i
                                                class='bx bxs-edit'></i></a>

                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deletePendaftaran{{ $pend->id }}">
                                            <i class='bx bx-trash'></i>
                                        </button>


                                    </td>
                                </tr>
                                <div class="modal fade" id="dokktpModal{{ $pend->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">KTP {{ $pend->name }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @if ($pend->dok_ktp)
                                                    <img width="100%"
                                                        src="{{ asset('/') }}images/{{ $pend->dok_ktp }}"
                                                        alt="">
                                                @else
                                                    <h4>KTP Belum di upload</h4>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- delete --}}

                                <div class="modal fade" id="deletePendaftaran{{ $pend->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">Hapus
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <br>
                                                <div class="text-center">Apakah anda yakin <br> akan menghapus data <br> an.
                                                    {{ $pend->name }} ?</div>
                                                <form action="{{ route('destroy.pendaftaran', $pend->id) }}" method="post"
                                                    style="display: inline-block">
                                                    @method('DELETE')
                                                    @csrf
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger">Hapus</button>
                                                </form>
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="6">Tidak Ditemukan</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div><br><br>
            <div class="pagination justify-content-center">
                <ul class="pagination">
                    <li class="page-item {{ $pendaftaran->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $pendaftaran->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    @foreach ($pendaftaran->getUrlRange(1, $pendaftaran->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $pendaftaran->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    <li class="page-item {{ $pendaftaran->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $pendaftaran->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $("#cari").change(function(e) {
                e.preventDefault();
                let cari = $("#cari").val();

                if (cari == "pemilik_kost") {
                    window.location.href = `{{ asset('/') }}pendaftaran/pemilik_kost`;
                } else if (cari == "penyewa") {
                    window.location.href = `{{ asset('/') }}pendaftaran/penyewa`;
                } else {
                    window.location.href = `{{ asset('/') }}pendaftaran`;
                }
            });
        });
    </script>
@endpush
