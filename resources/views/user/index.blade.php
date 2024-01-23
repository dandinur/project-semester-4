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
            <a href='{{ route('user.create') }}' class="btn btn-primary">+ Tambah Data</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-3">Nama </th>
                    <th class="col-md-2">Username</th>
                    <th class="col-md-2">Level</th>
                    <th class="col-md-2">aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->level }}</td>
                        <td><a href='{{ route('user.edit', [$user->id]) }}' class="btn btn-warning btn-sm">Edit</a>
                            <form class="d-inline" action="{{ route('user.destroy', [$user->id]) }}" method="POST"
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
        {{-- {{ $user->links() }} --}}
    </div>
@endsection
