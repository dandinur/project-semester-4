@extends('layouts.main')
@section('isi')
    <div class="card-body">
        <form action='{{ route('timbangan.store') }}' method='post'>
            @csrf
            <div class="form-group">
                <label>Nama balita</label>
                <select id="balita_id" name="balita_id" class="form-control">
                    <option value=""></option>
                    @foreach ($balita as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_balita }}</option>
                    @endforeach
                </select>
            </div>
            <div class="">
                <label>Berat badan</label>
                <div class="">
                    <input type="number" class="form-control" name='bb' id="bb" value="{{ old('bb') }}"
                        placeholder="masukan nilai kilogram">
                </div>
            </div>
            <div class="">
                <label>lingkar kepala</label>
                <div class="">
                    <input type="number" class="form-control" name='lingkarkepala' id="lingkarkepala"
                        value="{{ old('lingkarkepala') }}" placeholder="masukan nilai centimeter">
                </div>
            </div>
            <div class="">
                <label>tinggi badan</label>
                <div class="">
                    <input type="number" class="form-control" name='tb' id="tb" value="{{ old('tb') }}"
                        placeholder="masukan nilai centimeter">
                </div>
            </div>
            <div class="mb-3 ">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Sekarang</label>
                <div class="">
                    <input type="date" class="form-control" name='tanggal' id="tanggal">
                </div>
            </div>
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="row">
                <a href="{{ route('timbangan.index') }}" class="btn btn-secondary">
                    << kembali</a>
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                        </div>
            </div>
            </div>
        </form>
    </div>
@endsection
