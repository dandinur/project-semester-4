@extends('layouts.main')

@section('judul')
    Halaman Home
@endsection

@section('isi')
    <!-- Default box -->
    <div class="row text-white">
        <div class="card" style="width: 18rem; height: 10rem; margin-left:40px">
            <div class="card-body bg-secondary">
                <div class="card-body-icon">
                    <i class="bi bi-people" style="font-size: 50px"></i>
                </div>
                <h3 class="">Jumlah User &nbsp; &nbsp; &nbsp;{{ $user_count }}</h3>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <!-- /.card -->
@endsection
