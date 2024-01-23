@extends('layouts.main')
@section('isi')
    <div class="card-body">
        <form action='{{ route('imunisasi.update', [$imunisasi->id]) }}' method='post'>
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama balita</label>
                <select id="balita_id" name="balita_id" class="form-control">
                    <option value="{{ $imunisasi->balita_id }}">{{ $imunisasi->balita->nama_balita }}</option>
                    @foreach ($balita as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_balita }}</option>
                    @endforeach
                </select>
            </div>
            <div class=" ">
                <label for="" class="form-label">Jenis Vaksin</label>
                <select id="vaksin_id" name="vaksin_id" class="form-control">
                    <option value="{{ $imunisasi->vaksin_id }}">{{ $imunisasi->vaksin->jenis_vaksin }}</option>
                    @foreach ($vaksin as $vaksin)
                        <option value="{{ $vaksin->id }}">{{ $vaksin->jenis_vaksin }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 ">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal imunisasi</label>
                <div class="mb-3">
                    <input type="date" class="form-control" name='tanggal' id="tanggal"
                        value="{{ $imunisasi->tanggal }}">
                </div>
            </div>

            <div class="row">
                <a href="{{ route('imunisasi.index') }}" class="btn btn-secondary">
                    << kembali</a>
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                        </div>
            </div>
        </form>
    </div>
@endsection
