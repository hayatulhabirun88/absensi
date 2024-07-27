@extends('web.template.content')

@section('title')
    Tambah Gallery
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Gallery</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('eskul.gallery.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="ekstrakulikuler" class="form-label">Ekstrakulikuler</label>
                            <select class="form-control" name="ekstrakulikuler" id="ekstrakulikuler">
                                <option value="">Pilih Ekstrakulikuler</option>
                                @foreach ($ekstrakulikuler as $eks)
                                    <option value="{{ $eks->id }}"
                                        {{ $eks->id == old('ekstrakulikuler') ? 'selected' : '' }}>
                                        {{ $eks->nama_ekstrakulikuler }}</option>
                                @endforeach
                            </select>
                            @error('ekstrakulikuler')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Album</label>
                            <input type="text" class="form-control" name="nama_album" value="{{ old('nama_album') }}">
                            @error('nama_album')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Foto Gallery</label>
                            <input type="file" class="form-control" name="foto[]" multiple>
                            @error('foto')
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
