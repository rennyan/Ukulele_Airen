@extends('layouts.app')

@section('content')
<div class="container col-md-6">
    <div class="card" id="cd">
        <div class="card-header bg-dark text-white">
            <h5>Edit Data | Ukulele Mandalika</h5>
        </div>
        <div class="card-body" id="cb">
            <form action="{{ route('edit', $dataProduk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama : </label>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Produk" value="{{$dataProduk->nama}}">
                </div>
                <div class="mb-3">
                  <label for="jenis" class="form-label">Jenis :</label>
                  <select class="form-select" aria-label="Default select example" name="jenis_id" id="jenis_id">
                    <option disabled value>Pilih Jenis</option>
                    <option value="{{ $dataProduk->jenis_id }}"> {{ $dataProduk->jenis->nama_jenis }} </option>
                    @foreach ($dataJenis as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_jenis}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="jenis" class="form-label">Warna :</label>
                  <select class="form-select" aria-label="Default select example" name="warna_id" id="warna_id">
                    <option disabled value>Pilih Warna</option>
                    <option value="{{ @$dataDetail->warna_id }}"> {{ @$dataDetail->warna->warna }} </option>
                    @foreach ($dataWarna as $item)
                    <option value="{{ $item->id }}">{{ $item->warna}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="hpp" class="form-label">Stok : </label>
                  <input type="text" class="form-control" name="stok" id="stok" placeholder="Masukkan Stok Produk" value="{{$dataDetail->stok}}">
                </div>
                <div class="mb-3">
                    <label for="hpp" class="form-label">HPP : </label>
                    <input type="text" class="form-control" name="hpp" id="hpp" placeholder="Masukkan HPP Produk" value="{{$dataProduk->hpp}}">
                  </div>
                <div class="mb-3">
                    <label for="hargaJual" class="form-label">Harga Jual : </label>
                    <input type="text" class="form-control" name="harga_jual" id="harga_jual" placeholder="Masukkan Harga Jual Produk" value="{{$dataProduk->harga_jual}}">
                </div>
                <div class="mb-3">
                  <label for="hpp" class="form-label">Image : </label>
                  <input type="file" class="form-control" name="foto_produk" id="foto_produk" placeholder="image" value="{{ @$dataDetail->foto_produk }}">
                  {{-- <img src="{{ asset('/image/foto_produk/'.@$dataDetail->foto_produk) }}" width="300px"> --}}
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
            
@endsection