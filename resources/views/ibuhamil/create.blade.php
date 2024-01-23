@extends('layouts.main')

@section('judul')
@endsection

@section('isi')
    <h2>
        <center>Form Tambah Data Ibu Hamil</center>
    </h2>

    <form action='{{ route('ibuhamil.store') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 ">
                <label for="nama_ibuhamil" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value="{{ old('nama') }}"
                        id="nama">
                </div>
            </div>
            <div class="mb-3 ">
                <label for="no" class="col-sm-2 col-form-label">No Telepon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='no' value="{{ old('no') }}"
                        id="no">
                </div>
            </div>
            <div class="mb-3 ">
                <label for="no" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='alamat' value="{{ old('alamat') }}"
                    id="no">
                </div>
            </div>
           
            <div class="row">
                <a href="{{ route('ibuhamil.index') }}" class="btn btn-secondary">
                    << kembali</a>
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                        </div>
            </div>
    </form>

@endsection
