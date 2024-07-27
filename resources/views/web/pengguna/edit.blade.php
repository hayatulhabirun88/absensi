@extends('web.template.content')

@section('title')
    Ubah Pengguna
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ubah Pengguna</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('update.pengguna', $pengguna->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Pengguna</label>
                            <input type="text" class="form-control" name="nama_pengguna"
                                value="{{ old('nama_pengguna', $pengguna->name) }}">
                            @error('nama_pengguna')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select class="form-control" name="level" id="level">
                                <option value="">Pilih Level</option>
                                <option value="admin" {{ old('level', $pengguna->level) == 'admin' ? 'selected' : '' }}>
                                    Admin</option>
                                <option value="kepala_sekolah"
                                    {{ old('level', $pengguna->level) == 'kepala_sekolah' ? 'selected' : '' }}>
                                    Kepala Sekolah</option>
                                <option value="pembina" {{ old('level', $pengguna->level) == 'pembina' ? 'selected' : '' }}>
                                    Pembina
                                </option>
                                <option value="orang_tua"
                                    {{ old('level', $pengguna->level) == 'orang_tua' ? 'selected' : '' }}>
                                    Orang Tua</option>
                                <option value="siswa" {{ old('level', $pengguna->level) == 'siswa' ? 'selected' : '' }}>
                                    Siswa</option>
                            </select>
                            @error('level')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email"
                                value="{{ old('email', $pengguna->email) }}">
                            @error('email')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                            @error('password')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <br>

                        <button class="btn btn-primary">Ubah</button>
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
