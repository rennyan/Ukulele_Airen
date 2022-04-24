@extends('admin.layouts.app')
@section('produk','active')

@section('title')
    Form {{@$produk ? ' Ubah' : ' Tambah'}}
@endsection
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Data Produk</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('produk.index')}}">Index</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{(@$produk ? ' Ubah' : ' Tambah')}} produk
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic Tables start -->
                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class=" col-12">
                            <div class="card">
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            <h4 class="alert-heading">Error!</h4>
                                            <div class="alert-body">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                    <form class="form form-vertical"  action="{{@$produk ? route('produk.update', $produk->detail[0]->id) : route('produk.store')}}"
                                          method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(@$produk)
                                            {{method_field('patch')}}
                                        @endif
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" id="produk" class="form-control" name="nama" placeholder="Nama"
                                                           value="{{old('nama', @$produk ? $produk->nama : '')}}"/>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="jenis_id">Jenis</label>
                                                    <select class="form-select form-control" id="jenis_id" name="jenis_id" >
                                                        <option value="">- Pilih Jenis Produk -</option>
                                                        @foreach($jenis as $row)
                                                            <option value="{{$row->id}}" {{@$produk && $produk->jenis_id == $row->id ? 'selected' : '' }}>{{$row->jenis}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="warna_id">Warna</label>
                                                    <select class="form-select form-control" id="warna_id" name="warna_id" >
                                                        <option value="">- Pilih Warna Produk -</option>
                                                        @foreach($warna as $row)
                                                            <option value="{{$row->id}}" {{@$produk && $produk->detail[0]->warna_id == $row->id ? 'selected' : '' }}>{{$row->warna}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="deskripsi">Deskripsi</label>
                                                    <textarea type="text" class="form-control" name="deskripsi" value="">{{old('deskripsi', @$produk ? $produk->detail[0]->deskripsi : '')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="spesifikasi">Spesifikasi</label>
                                                    <textarea type="text" class="form-control" name="spesifikasi" value="">{{old('spesifikasi', @$produk ? $produk->detail[0]->spesifikasi : '')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="foto_produk">Foto Produk</label>
                                                    <input type="file" id="foto_produk" class="form-control" name="foto_produk" placeholder=""
                                                           value="{{old('foto_produk', @$produk ? $produk->detail[0]->foto_produk : '')}}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="stok">Stok</label>
                                                    <input type="number" min="0" id="stok" class="form-control" name="stok" placeholder="10"
                                                           value="{{old('stok', @$produk ? $produk->detail[0]->stok : '')}}""/>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="hpp">Hpp</label>
                                                    <input type="number" min="0" id="hpp" class="form-control" name="hpp" placeholder="100000"
                                                           value="{{old('hpp', @$produk ? $produk->hpp : '')}}"/>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="harga_jual">Harga</label>
                                                    <input type="number" min="0" id="harga_jual" class="form-control" name="harga_jual" placeholder="100000"
                                                           value="{{old('harga_jual', @$produk ? $produk->harga_jual : '')}}"/>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                                <a href="{{route('produk.index')}}" type="reset" class="btn btn-outline-secondary">Cancel</a>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Tables end -->
            </div>
        </div>
    </div>

@endsection

@push('styles')
@endpush

@push('scripts')
    <script>

    </script>
@endpush
