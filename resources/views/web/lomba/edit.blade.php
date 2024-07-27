@extends('web.template.content')

@section('title')
    Ubah Lomba
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ubah Lomba</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="{{ route('eskul.lomba.update', $lomba->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Judul Lomba</label>
                                    <input type="text" class="form-control" name="judul_lomba"
                                        value="{{ old('judul_lomba', $lomba->judul_lomba) }}">
                                    @error('judul_lomba')
                                        <span style="color:red;font-size:13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Tempat</label>
                                    <input type="text" class="form-control" name="tempat"
                                        value="{{ old('tempat', $lomba->tempat) }}">
                                    @error('tempat')
                                        <span style="color:red;font-size:13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tgl_mulai"
                                        value="{{ old('tgl_mulai', $lomba->tgl_mulai) }}">
                                    @error('tgl_mulai')
                                        <span style="color:red;font-size:13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Selesai</label>
                                    <input type="date" class="form-control" name="tgl_selesai"
                                        value="{{ old('tgl_selesai', $lomba->tgl_selesai) }}">
                                    @error('tgl_selesai')
                                        <span style="color:red;font-size:13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10">{{ old('deskripsi', $lomba->deskripsi) }}</textarea>
                                    @error('deskripsi')
                                        <span style="color:red;font-size:13px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" class="form-control" name="foto_utama">
                                    @error('foto_utama')
                                        <span style="color:red;font-size:13px;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <br>

                                <button class="btn btn-primary">Update</button>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <label for="foto_lomba">Foto Lomba</label>
                            <img width="100%"
                                src="{{ asset('/') }}{{ env('ASSET_UPLOAD') }}/foto_lomba/{{ $lomba->foto_utama }}"
                                alt="">
                        </div>
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
            $("#hapuseskul").click(function(e) {
                e.preventDefault();
                swal({
                    title: 'Apakah anda yakin?',
                    text: 'Akan menghapus eskul ' + this.getAttribute('data-nama-eskul') + ' !',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $("#deleteEskulForm").submit();
                    }
                });
            });

        });
    </script>
@endpush
