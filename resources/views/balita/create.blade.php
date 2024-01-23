@extends('layouts.main')

@section('judul')
@endsection

@section('isi')
    <h2>
        <center>Form Tambah Data Balita</center>
    </h2>

    <form action='{{ route('balita.store') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 ">
                <label for="nama_balita" class="col-sm-2 col-form-label">nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama_balita' value="{{ old('nama_balita') }}"
                        id="nama_balita">
                </div>
            </div>
            <div class="mb-3 ">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal lahir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='tanggal_lahir' value="{{ old('tanggal_lahir') }}"
                        id="tanggal_lahir">
                </div>
            </div>

            <div class="mb-3 ">
                <label for="jenis_kelamin" class="col-sm-2 col-form-label">jenis kelamin</label>
                <div class="col-sm-10">
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control select-multiple">
                        <option disabled value>pilih jenis Kelamin</option>
                        <option value="laki-laki">Laki Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <a href="{{ route('balita.index') }}" class="btn btn-secondary">
                    << kembali</a>
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                        </div>
            </div>
    </form>

@endsection
