<style>
    h2 {
      text-align: center;
    }
    .card {
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      border-radius: 5px;
      transition: 0.3s;
      width: 20%;
      float: left;
      margin-right: 20px;
      margin-left: 30px;
    }
    
    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
    
    .container {
      padding: 10px 20px;
    }
</style>

@extends('layouts.app')

@section('content')

<h2><b>Produk Ukulele Mandalika</b></h2> 

<a class="nav-link" href="{{ route('create') }}"><button type="submit" class="btn btn-primary">Add Product</button></a>

@foreach ($datas as $produk)
<div class="card">
  @foreach($produk->detail as $detail)
    <a href="/detail/{{ $produk->id }}"><img src="{{ asset('/image/foto_produk/'.@$produk->detail[0]->foto_produk) }}" alt="Produk" style="width:100%"></a>
    @endforeach
    <div class="container">
        <h5><b>{{$produk->nama}}</b></h5> 
        <p>{{$produk->harga_jual}}</p> 
    </div>
</div>
@endforeach

@endsection