@extends('web.template.content')

@section('title')
    Tambah Jadwal
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Jadwal</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('eskul.jadwal.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Nama Ekstrakulikuler</label>

                            <select class="form-control" name="nama_ekstrakulikuler" id="nama_ekstrakulikuler">
                                <option value="">Pilih Ekstrakulikuler</option>
                                @foreach ($ekstrakulikuler as $ekstra)
                                    <option value="{{ $ekstra->id }}"
                                        {{ $ekstra->id == old('nama_ekstrakulikuler') ? 'selected' : '' }}>
                                        {{ $ekstra->nama_ekstrakulikuler }}</option>
                                @endforeach
                            </select>
                            @error('nama_ekstrakulikuler')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pembina</label>
                            <select class="form-control" name="pembina" id="pembina">
                                <option value="">Pilih Pembina</option>
                                @foreach ($pembina as $pem)
                                    <option value="{{ $pem->id }}" {{ $pem->id == old('pembina') ? 'selected' : '' }}>
                                        {{ $pem->nama_pembina }}</option>
                                @endforeach
                            </select>
                            @error('pembina')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tempat</label>
                            <input type="text" class="form-control" name="tempat" value="{{ old('tempat') }}">
                            @error('tempat')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" name="tgl_kegiatan"
                                value="{{ old('tgl_kegiatan') }}">
                            @error('tgl_kegiatan')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jam Mulai</label>
                            <input type="time" class="form-control" name="jam_mulai" value="{{ old('jam_mulai') }}">
                            @error('jam_mulai')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jam Selesai</label>
                            <input type="time" class="form-control" name="jam_selesai" value="{{ old('jam_selesai') }}">
                            @error('jam_selesai')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <br>

                        <button class="btn btn-primary">Tambah</button>
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
