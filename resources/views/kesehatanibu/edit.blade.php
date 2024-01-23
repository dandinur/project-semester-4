@extends('layouts.main')
@section('isi')
    <div class="card-body">
        <form action='{{ route('kesehatanibu.update', [$kesehatanibu->id]) }}' method='post'>
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama</label>
                <select id="ibuhamil_id" name="ibuhamil_id" class="form-control">
                    <option value="{{$kesehatanibu->ibuhamil_id}}">{{$kesehatanibu->ibuhamil->nama}}</option>
                    @foreach ($ibuhamil as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="">
                <label>Berat badan</label>
                <div class="">
                    <input type="number" class="form-control" name='bb' id="bb" value="{{ $kesehatanibu->bb }}"
                        placeholder="masukan nilai kilogram">
                </div>
            </div>
            <div class="">
                <label>Lingkar Lengan</label>
                <div class="">
                    <input type="number" class="form-control" name='lila' id="lila"
                        value="{{ $kesehatanibu->lila }}" placeholder="masukan nilai centimeter">
                </div>
            </div>
            <div class="">
                <label>Lingkar Perut</label>
                <div class="">
                    <input type="number" class="form-control" name='lingkarperut' id="lingkarperut" value="{{$kesehatanibu->lingkarperut }}"
                        placeholder="masukan nilai centimeter">
                </div>
            </div>
            <div class="mb-3 ">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Sekarang</label>
                <div class="">
                    <input type="date" class="form-control" name='tanggal' id="tanggal" value="{{$kesehatanibu->tanggal}}">
                </div>
            </div>
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="row">
                <a href="{{ route('kesehatanibu.index') }}" class="btn btn-secondary">
                    << kembali</a>
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                        </div>
            </div>
    </div>
    </form>
    </div>
@endsection
