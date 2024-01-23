@extends('layouts.main')

@section('judul')
@endsection

@section('isi')
    <h2>
        <center>Form Edit Data User</center>
    </h2>

    <form action='{{ route('user.update', [$user->id]) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 ">
                <label for="name" class="col-sm-2 col-form-label">nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='name' value="{{ $user->name }}" id="name">
                </div>
            </div>
            <div class="mb-3 ">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='username' value="{{ $user->username }}" id="username">
                </div>
            </div>
            <div class="mb-3 ">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='password' value="" id="password">
                </div>
            </div>
            <div class="mb-3 ">
                <label for="level" class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='level' value="{{ $user->level }}" id="level">
                </div>
            </div>
            <div class="row">
                <a href="{{ route('user.index') }}" class="btn btn-secondary">
                    << kembali</a>
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit"
                                value="update">Update</button></div>
            </div>
    </form>
@endsection
