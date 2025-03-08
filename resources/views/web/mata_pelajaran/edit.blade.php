@extends('web.template.content')

@section('title')
    Ubah Mata Pelajaran
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ubah Mata Pelajaran</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('mata-pelajaran.update', $matapelajaran->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama">Mata Pelajaran</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                value="{{ old('nama', $matapelajaran->nama) }}" required>
                            @error('nama')
                                <span class="text-danger" style="font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kode">Kode Mata Pelajaran</label>
                            <input type="text" class="form-control" name="kode" id="kode"
                                value="{{ old('kode', $matapelajaran->kode) }}" required>
                            @error('kode')
                                <span class="text-danger" style="font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jam_awal">Jam Awal</label>
                            <input type="time" class="form-control" name="jam_awal" id="jam_awal"
                                value="{{ old('jam_awal', $matapelajaran->jam_awal) }}" required>
                            @error('jam_awal')
                                <span class="text-danger" style="font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jam_akhir">Jam Akhir</label>
                            <input type="time" class="form-control" name="jam_akhir" id="jam_akhir"
                                value="{{ old('jam_akhir', $matapelajaran->jam_akhir) }}" required>
                            @error('jam_akhir')
                                <span class="text-danger" style="font-size:13px;">{{ $message }}</span>
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
