@extends('web.template.content')

@section('title')
    Tambah Siswa
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Siswa</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('siswa.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="text" class="form-control" name="nis" value="{{ old('nis') }}">
                            @error('nis')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control">
                                <option value=""> Pilih Kelas</option>
                                @foreach ($kelas as $dkelas)
                                    <option value="{{ $dkelas->id }}">{{ $dkelas->nama_kelas }} {{ $dkelas->program }}
                                        {{ $dkelas->jurusan }}</option>
                                @endforeach
                            </select>
                            @error('wali_kelas')
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
