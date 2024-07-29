@extends('web.template.content')

@section('title')
    Tambah Guru
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Guru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('guru.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>NIP</label>
                            <input type="text" class="form-control" name="nip" value="{{ old('nip') }}">
                            @error('nip')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Guru</label>
                            <input type="text" class="form-control" name="nama_guru" value="{{ old('nama_guru') }}">
                            @error('nama_guru')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mata Pelajaran</label>
                            <input type="text" class="form-control" name="matapelajaran"
                                value="{{ old('matapelajaran') }}">
                            @error('matapelajaran')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}">
                            @error('alamat')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>No HP</label>
                            <input type="text" class="form-control" name="no_hp" value="{{ old('no_hp') }}">
                            @error('no_hp')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
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
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input type="password_confirmation" class="form-control" name="password_confirmation">
                            @error('password_confirmation')
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
