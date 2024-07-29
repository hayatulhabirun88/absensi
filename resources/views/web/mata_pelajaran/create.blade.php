@extends('web.template.content')

@section('title')
    Tambah Mata Pelajaran
@endsection

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Mata Pelajaran</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('mata-pelajaran.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Mata Pelajaran</label>
                            <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <span style="color:red;font-size:13px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kode Mata Pelajaran</label>
                            <input type="text" class="form-control" name="kode" value="{{ old('kode') }}">
                            @error('kode')
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
