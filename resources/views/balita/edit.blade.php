@extends('layouts.main')

@section('judul')
@endsection

@section('isi')
    <h2>
        <center>Form Edit Data Balita</center>
    </h2>

    <form action='{{ route('balita.update', [$balita->id]) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 ">
                <label for="nama_balita" class="col-sm-2 col-form-label">nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama_balita' value="{{ $balita->nama_balita }}"
                        id="nama_balita">
                </div>
            </div>
            <div class="mb-3 ">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal lahir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='tanggal_lahir' value="{{ $balita->tanggal_lahir }}"
                        id="tanggal_lahir">
                </div>
            </div>

            <div class="mb-3 ">
                <label for="jenis_kelamin" class="col-sm-2 col-form-label">jenis kelamin</label>
                <div class="col-sm-10">
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control select-multiple">
                        <option value="laki-laki"@if ($balita->jenis_kelamin == 'laki-laki') selected @endif>Laki Laki
                        </option>
                        <option value="perempuan" @if ($balita->jenis_kelamin == 'perempuan') selected @endif>Perempuan
                        </option>
                    </select>
                </div>
            </div>
            <div class="row">
                <a href="{{ route('balita.index') }}" class="btn btn-secondary">
                    << kembali</a>
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit"
                                value="update">Update</button></div>
            </div>
    </form>
@endsection
