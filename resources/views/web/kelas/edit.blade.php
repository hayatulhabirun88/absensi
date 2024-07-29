@extends('web.template.content')

@section('title')
    Ubah Kelas
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ubah Kelas</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('kelas.update', $kelas->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Kelas</label>
                            <input type="text" class="form-control" name="nama_kelas"
                                value="{{ old('nama_kelas', $kelas->nama_kelas) }}">
                            @error('nama_kelas')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Program</label>
                            <input type="text" class="form-control" name="program"
                                value="{{ old('program', $kelas->program) }}">
                            @error('program')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" class="form-control" name="jurusan"
                                value="{{ old('jurusan', $kelas->jurusan) }}">
                            @error('jurusan')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Wali Kelas</label>
                            <input type="text" class="form-control" name="wali_kelas"
                                value="{{ old('wali_kelas', $kelas->wali_kelas) }}">
                            @error('wali_kelas')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tahun Ajaran</label>
                            <select name="tahun_ajaran" class="form-control" id="tahun_ajaran" name="tahun_ajaran">
                                <option value="">Pilih Tahun Ajaran</option>
                                <option value="2023/2024"
                                    {{ old('tahun_ajaran', $kelas->tahun_ajaran) == '2023/2024' ? 'selected' : '' }}>
                                    2023/2024</option>
                                <option value="2024/2025"
                                    {{ old('tahun_ajaran', $kelas->tahun_ajaran) == '2024/2025' ? 'selected' : '' }}>
                                    2024/2025</option>
                            </select>
                            @error('tahun_ajaran')
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
