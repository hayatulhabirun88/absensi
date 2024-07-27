@extends('web.template.content')

@section('title')
    Ubah Pendaftaran
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pendaftaran /</span> Ubah</h4>
        <div class="card">
            <h5 class="card-header">Ubah Pendaftaran</h5>
            <div class="card-body">
                <form action="{{ route('update.pendaftaran', $pendaftaran->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $pendaftaran->name) }}" placeholder="Nama"
                                    aria-describedby="defaultFormControlHelp">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $pendaftaran->email) }}" placeholder="Email"
                                    aria-describedby="defaultFormControlHelp">
                            </div>
                            <div class="mb-3">
                                <label for="no_tlp" class="form-label">No Telp</label>
                                <input type="no_tlp" class="form-control" id="no_tlp" name="no_tlp"
                                    value="{{ old('no_tlp', $pendaftaran->no_tlp) }}" placeholder="No Telp"
                                    aria-describedby="defaultFormControlHelp">
                            </div>
                            <div class="mb-3">
                                <label for="level" class="form-label">Keterangan</label>
                                <select class="form-select" id="level" name="level">
                                    <option>-- Pilih Keterangan --</option>
                                    <option value="pemilik_kost"
                                        {{ $pendaftaran->level == 'pemilik_kost' ? 'selected' : '' }}>
                                        Pemilik
                                    </option>
                                    <option value="penyewa" {{ $pendaftaran->level == 'penyewa' ? 'selected' : '' }}>Penyewa
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Dokumen KTP</label>
                                <div class="mb-3">
                                    <input type="file" class="form-control" name="dok_ktp" id="dok_ktp"
                                        placeholder="Dokumen KTP" aria-describedby="fileHelpId" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="" height="300px">
                                <div class="mb-3">
                                    @if ($pendaftaran->dok_ktp)
                                        <img class="img-fluid" src="{{ asset('/') }}images/{{ $pendaftaran->dok_ktp }}"
                                            alt="">
                                    @else
                                        <h1>KTP tidak di upload</h1>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Ubah">
                        </div>
                    </div>
                </form>


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
