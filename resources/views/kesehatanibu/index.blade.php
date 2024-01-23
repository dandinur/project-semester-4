@extends('layouts.main')

@section('isi')
    <h3>
        <center>Cek Kesehatan Ibu Hamil</center>
    </h3>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                    placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{ route('kesehatanibu.create') }}' class="btn btn-primary">+ Tambah Data</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-2">Nama</th>
                    <th class="col-md-2">berat badan</th>
                    <th class="col-md-2">lingkar lengan</th>
                    <th class="col-md-2">lingkar perut</th>
                    <th class="col-md-2">tanggal timbang</th>
                    <th class="col-md-2"> Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kesehatanibu as $item)  
                <tr>
                    <td>{{$item->ibuhamil->nama}}</td>
                    <td>{{$item->bb}} kg</td>
                    <td>{{$item->lila}} Cm</td>
                    <td>{{$item->lingkarperut}} Cm</td>
                    <td>{{$item->tanggal}}</td>
                    <td>
                        <a href='{{ route('kesehatanibu.edit', [$item->id]) }}' class="btn btn-warning btn-sm">Edit</a>
                            <form class="d-inline" action="{{ route('kesehatanibu.destroy', [$item->id]) }}" method="POST"
                                onsubmit="return confirm('Yakin hapus data?')">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                    </td>
                </tr>
                @endforeach    
            </tbody>
        </table>

    </div>
@endsection
