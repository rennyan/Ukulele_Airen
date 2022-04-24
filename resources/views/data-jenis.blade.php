@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 mt-2">
            <a class="nav-link" href="{{ route('createJenis') }}"><button type="submit" class="btn btn-primary">Add Jenis</button></a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
            <div class="col-lg-8 mt-4">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="100px">No. </th>
                            <th width="200px">Nama Jenis</th>
                            <th width="150px">Action</th>
                        </tr>
                    </thead>
                    <?php $no = 1; ?>
                    <tbody>
                        @foreach ($data as $jenis)
                        <tr>  
                            <td>{{ $no++ }}</td>
                            <td>{{$jenis->nama_jenis}}</td>  
                            <td>
                                <a href="{{ route('editJenis', $jenis->id) }}"><button class="btn btn-warning">Edit</button></a>
                                    <form method="POST" action="{{ route('destroyJenis', $jenis->id ) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                            </td>
                          </tr>  
                         @endforeach  
                    </tbody>
                </table>
            </div>
@endsection