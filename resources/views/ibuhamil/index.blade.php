@extends('layouts.main')

@section('isi')
    <h3>
        <center>Form Data Ibu Hamil</center>
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
            <a href='{{ route('ibuhamil.create') }}' class="btn btn-primary">+ Tambah Data</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-3">Nama </th>
                    <th class="col-md-2">No Telpon</th>
                    <th class="col-md-2">Alamat</th>
                    <th class="col-md-2">aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $ibuhamil->firstItem(); ?>
                @foreach ($ibuhamil as $item)
                    <tr>
                        <td> {{ $i }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->no }}</td>
                        <td>{{ $item->alamat }}</td>


                        <td>
                            <a href='{{ route('ibuhamil.edit', [$item->id]) }}' class="btn btn-warning btn-sm">Edit</a>
                            <form class="d-inline" action="{{ route('ibuhamil.destroy', [$item->id]) }}" method="POST"
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
        {{ $ibuhamil->links() }}
    </div>
@endsection
