@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 mt-2">
            <a class="nav-link" href="{{ route('createWarna') }}"><button type="submit" class="btn btn-primary">Add Warna</button></a>
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
                            <th width="200px">Warna</th>
                            <th width="150px">Action</th>
                        </tr>
                    </thead>
                    <?php $no = 1; ?>
                    <tbody>
                        @foreach ($data as $warna)
                        <tr>  
                            <td>{{ $no++ }}</td>
                            <td>{{$warna->warna}}</td>  
                            <td>
                                <a href="{{ route('editWarna',$warna->id) }}"><button class="btn btn-warning">Edit</button></a>
                                    <form method="POST" action="{{ route('destroyWarna', $warna->id ) }}">
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
