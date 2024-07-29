@extends('web.template.content')

@section('title')
    Tambah Kelas
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Kelas</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('kelas.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Nama Kelas</label>
                            <input type="text" class="form-control" name="nama_kelas" value="{{ old('nama_kelas') }}">
                            @error('nama_kelas')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Program</label>
                            <input type="text" class="form-control" name="program" value="{{ old('program') }}">
                            @error('program')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" class="form-control" name="jurusan" value="{{ old('jurusan') }}">
                            @error('jurusan')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Wali Kelas</label>
                            <input type="text" class="form-control" name="wali_kelas" value="{{ old('wali_kelas') }}">
                            @error('wali_kelas')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tahun Ajaran</label>
                            <select name="tahun_ajaran" class="form-control" id="tahun_ajaran" name="tahun_ajaran">
                                <option value="">Pilih Tahun Ajaran</option>
                                <option value="2023/2024">2023/2024</option>
                                <option value="2024/2025">2024/2025</option>
                            </select>
                            @error('tahun_ajaran')
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
