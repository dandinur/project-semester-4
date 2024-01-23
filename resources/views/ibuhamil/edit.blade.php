@extends('layouts.main')

@section('judul')
@endsection

@section('isi')
    <h2>
        <center>Form Edit Data Ibu Hamil</center>
    </h2>

    <form action='{{ route('ibuhamil.update', [$ibuhamil->id]) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 ">
                <label for="nama" class="col-sm-2 col-form-label">nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value="{{ $ibuhamil->nama }}" id="nama">
                </div>
            </div>
            <div class="mb-3 ">
                <label for="no" class="col-sm-2 col-form-label">No Telpon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='no' value="{{ $ibuhamil->no }}" id="no">
                </div>
            </div>
            <div class="mb-3 ">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='alamat' value="{{ $ibuhamil->alamat }}"
                        id="alamat">
                </div>
            </div>
            <div class="row">
                <a href="{{ route('ibuhamil.index') }}" class="btn btn-secondary">
                    << kembali</a>
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit"
                                value="update">Update</button></div>
            </div>
    </form>
@endsection
