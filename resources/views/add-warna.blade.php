@extends('layouts.app')

@section('content')
<div class="container col-md-6">
    <div class="card" id="cd">
        <div class="card-header bg-dark text-white">
            <h5>Add Warna | Ukulele Mandalika</h5>
        </div>
        <div class="card-body" id="cb">
            <form action="{{ route('storeWarna') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="nama" class="form-label">Warna : </label>
                  <input type="text" class="form-control" name="warna" id="warna" placeholder="Masukkan Warna">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
            
@endsection