@extends('layouts.app')

@section('content')
<a href="/edit/{{ $produk->id }}"><button class="btn btn-warning">Edit</button></a>
{{-- <a href="{{ route('edit', $produk->id) }}"><button class="btn btn-warning">Edit</button></a> --}}
<br>

    <form method="POST" action="{{ route('detail', $produk->id ) }}">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Delete</button>
    </form>
</a>

@endsection
