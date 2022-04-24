@extends('layouts.app')

@section('content')
<div class="container col-md-6">
    <div class="card" id="cd">
        <div class="card-header bg-dark text-white">
            <h5>Edit Jenis | Ukulele Mandalika</h5>
        </div>
        <div class="card-body" id="cb">
            <form action="{{ route('editJenis', $jenis->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Jenis : </label>
                  <input type="text" class="form-control" name="nama_jenis" id="nama_jenis" placeholder="Masukkan Nama Jenis" value="{{ $jenis->nama_jenis }}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
            
@endsection