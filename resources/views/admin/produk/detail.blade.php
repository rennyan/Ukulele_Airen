@extends('admin.layouts.app')
@section('produk','active')

@section('title')
    Detail {{@$produk ? ' Produk' : ''}}
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
                                    <li class="breadcrumb-item active">{{(@$produk ? ' Detail' : '')}} Produk
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
                <!-- app e-commerce details start -->
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
                    <div class="row my-2">
                        <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="{{ asset ('image/foto_produk/'. @$produk->detail[0]->foto_produk)}}" alt="Ukulele" class="img-fluid product-img" alt="product image" />
                            </div>
                        </div>
                        <div class="col-12 col-md-7">
                            <h3>{{$produk->nama}}</h3>
                            <span class="card-text item-company">By <a href="javascript:void(0)" class="company-name">Airen</a></span>
                            <div class="ecommerce-details-price d-flex flex-wrap mt-1">
                                <h4 class="item-price mr-1">Rp. {{$produk->harga_jual}}</h4>
                                <ul class="unstyled-list list-inline pl-1 border-left">
                                    <li>⭐</li>
                                    <li>⭐</li>
                                    <li>⭐</li>
                                    <li>⭐</li>
                                    <li>⭐</li>
                                </ul>
                            </div>
                            <p class="card-text">{{@$produk->detail[0]->warna->warna}} - <span class="text-success">{{@$produk->jenis->jenis}}</span></p>
                            <p class="card-text">
                                {{@$produk->detail[0]->deskripsi}}
                            </p>
                            <p class="card-text"><b>Spesifikasi : </b></p>
                            <p class="card-text">
                                {{@$produk->detail[0]->spesifikasi}}
                            </p>    
                            <ul class="product-features list-unstyled">
                                <li><i data-feather="shopping-cart"></i> <span><b>Free Shipping</b></span></li>
                            </ul>
                            <hr />
                            <div class="product-color-options">
                                <h6>Stok tersedia : </h6>
                                <p>
                                    {{@$produk->detail[0]->stok}}
                                </p>
                            </div>
                            <hr />
                            <div class="d-flex flex-column flex-sm-row pt-1">
                                <a href="javascript:void(0)" class="btn btn-primary btn-cart mr-0 mr-sm-1 mb-1 mb-sm-0">
                                    <i data-feather="shopping-cart" class="mr-50"></i>
                                    <span class="add-to-cart">Add to cart</span>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-outline-secondary btn-wishlist mr-0 mr-sm-1 mb-1 mb-sm-0">
                                    <i data-feather="heart" class="mr-50"></i>
                                    <span>Wishlist</span>
                                </a>
                                <div class="btn-group dropdown-icon-wrapper btn-share">
                                    <button type="button" class="btn btn-icon hide-arrow btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i data-feather="share-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>                                   
                                
@endsection

@push('styles')
@endpush

@push('scripts')
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
@endpush
