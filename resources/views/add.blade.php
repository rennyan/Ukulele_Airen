@extends('layouts.app')

@section('content')
<div class="container col-md-6">
    <div class="card" id="cd">
        <div class="card-header bg-dark text-white">
            <h5>Add Data | Ukulele Mandalika</h5>
        </div>
        <div class="card-body" id="cb">
            <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama : </label>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Produk">
                </div>
                <div class="mb-3">
                  <label for="jenis" class="form-label">Jenis :</label>
                  <select class="form-select" aria-label="Default select example" name="jenis_id" id="jenis_id">
                    <option value>Pilih Jenis</option>
                    @foreach ($dataJenis as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_jenis}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="jenis" class="form-label">Warna :</label>
                  <select class="form-select" aria-label="Default select example" name="warna_id" id="warna_id">
                    <option value>Pilih Warna</option>
                    @foreach ($dataWarna as $item)
                    <option value="{{ $item->id }}">{{ $item->warna}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="hpp" class="form-label">Stok : </label>
                  <input type="text" class="form-control" name="stok" id="stok" placeholder="Masukkan Stok Produk">
                </div>
                <div class="mb-3">
                  <label for="deskripsi">Deskripsi :</label>
                  <textarea class="form-control" placeholder="Masukkan Deskripsi Produk" name="deskripsi" id="deskripsi" style="height: 100px"></textarea>
                </div>
                <div class="mb-3">
                  <label for="spesifikasi">Spesifikasi :</label>
                  <textarea class="form-control" placeholder="Masukkan Spesifikasi Produk" name="spesifikasi" id="spesifikasi" style="height: 100px"></textarea>
                </div>
                <div class="mb-3">
                    <label for="hpp" class="form-label">HPP : </label>
                    <input type="number" class="form-control" name="hpp" id="hpp" placeholder="Masukkan HPP Produk">
                  </div>
                <div class="mb-3">
                    <label for="hargaJual" class="form-label">Harga Jual : </label>
                    <input type="number" class="form-control" name="harga_jual" id="harga_jual" placeholder="Masukkan Harga Jual Produk">
                </div>
                <div class="mb-3">
                  <label for="hpp" class="form-label">Image : </label>
                  <input type="file" class="form-control" name="foto_produk" id="foto_produk" placeholder="image">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
            
@endsection