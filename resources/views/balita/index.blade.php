@extends('layouts.main')

@section('isi')
    <h3>
        <center>Form Data Balita</center>
    </h3>
    <div class="my-1 p-1 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="" method="get">
                <input type="search" name="search" class="form-control"placeholder="Cari berdadasarkan Nama"
                aria-label="Cari berdasarkan nama" aria-describedby="basic-addon2">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>
        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{ route('balita.create') }}' class="btn btn-primary">+ Tambah Data</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-3">Nama </th>
                    <th class="col-md-2">tanggal Lahir</th>
                    <th class="col-md-2">Jenis Kelamin</th>
                    <th class="col-md-2">aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $balita->firstItem(); ?>
                @foreach ($balita as $item)
                    <tr>
                        <td> {{ $i }}</td>
                        <td>{{ $item->nama_balita }}</td>
                        <td>{{ $item->tanggal_lahir }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>


                        <td>
                            <a href='{{ route('balita.edit', [$item->id]) }}' class="btn btn-warning btn-sm">Edit</a>
                            <form class="d-inline" action="{{ route('balita.destroy', [$item->id]) }}" method="POST"
                                onsubmit="return confirm('Yakin hapus data?')">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>

                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
        {{ $balita->links() }}
    </div>
@endsection
