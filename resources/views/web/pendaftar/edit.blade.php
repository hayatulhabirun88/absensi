@extends('web.template.content')

@section('title')
    Edit Pendaftar
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Pendaftar</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('eskul.pendaftar.update', $pendaftar->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap"
                                value="{{ old('nama_lengkap', $pendaftar->nama_lengkap) }}">
                            @error('nama_lengkap')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" class="form-control" name="kelas"
                                value="{{ old('kelas', $pendaftar->kelas) }}">
                            @error('kelas')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir"
                                value="{{ old('tempat_lahir', $pendaftar->tempat_lahir) }}">
                            @error('tempat_lahir')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir"
                                value="{{ old('tgl_lahir', $pendaftar->tgl_lahir) }}">
                            @error('tgl_lahir')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10">{{ old('alamat', $pendaftar->alamat) }}</textarea>
                            @error('tempat_lahir')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>No HP</label>
                            <input type="text" class="form-control" name="no_hp"
                                value="{{ old('no_hp', $pendaftar->no_hp) }}">
                            @error('no_hp')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Hobi</label>
                            <input type="text" class="form-control" name="hobi"
                                value="{{ old('hobi', $pendaftar->hobi) }}">
                            @error('hobi')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="ekstrakulikuler">Ekstrakulikuler</label>
                            <select class="form-control" name="ekstrakulikuler" id="ekstrakulikuler">
                                <option value="">Pilih Ekstrakulikuler</option>
                                @foreach ($ekstrakulikuler as $ekstra)
                                    <option value="{{ $ekstra->id }}"
                                        {{ $pendaftar->ekstrakulikuler_id == $ekstra->id ? 'selected' : '' }}>
                                        {{ $ekstra->nama_ekstrakulikuler }}</option>
                                @endforeach
                            </select>
                        </div><br>
                        <button class="btn btn-sm btn-primary">Ubah</button>
                    </form>
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
