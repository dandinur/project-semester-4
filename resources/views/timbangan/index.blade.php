@extends('layouts.main')

@section('isi')
    <h3>
        <center>Form Data imunisasi</center>
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
            <a href='{{ route('timbangan.create') }}' class="btn btn-primary">+ Tambah Data</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-2">Nama balita</th>
                    <th class="col-md-2">berat badan</th>
                    <th class="col-md-2">lingkar kepala</th>
                    <th class="col-md-2">tinggi badan</th>
                    <th class="col-md-2">tanggal timbang</th>
                    <th class="col-md-2"> Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($timbangan as $item)
                    <tr>
                        <td>{{ $item->balita->nama_balita }}</td>
                        <td>{{ $item->bb }} kg</td>
                        <td>{{ $item->lingkarkepala }} Cm</td>
                        <td>{{ $item->tb }} Cm</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>
                            <a href='{{ route('timbangan.edit', [$item->id]) }}' class="btn btn-warning btn-sm">Edit</a>
                            <form class="d-inline" action="{{ route('timbangan.destroy', [$item->id]) }}" method="POST"
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
