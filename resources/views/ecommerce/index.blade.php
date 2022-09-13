@extends('layouts.ecommerce')

@section('title')
    <title>ServicIyan - Pusat Service Produk Apple Terbaik</title>
@endsection

@section('content')
    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="{{ asset('ecommerce/assets/image/IMG_0170.png') }}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Servic</b>Iyan</h1>
                                <h3 class="h2">MacLogic Repair</h3>
                                <p>
                                    Tempat Service Macbook terbaik dan termurah kota Bandung.
                                    {{-- This template is 100% free provided by <a rel="sponsored" class="text-success"
                                        href="https://templatemo.com" target="_blank">TemplateMo</a> website.
                                    Image credits go to <a rel="sponsored" class="text-success"
                                        href="https://stories.freepik.com/" target="_blank">Freepik Stories</a>,
                                    <a rel="sponsored" class="text-success" href="https://unsplash.com/"
                                        target="_blank">Unsplash</a> and
                                    <a rel="sponsored" class="text-success" href="https://icons8.com/" target="_blank">Icons
                                        8</a>. --}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="{{ asset('ecommerce/assets/image/IMG_0171.png') }}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Cepat dan Detail</h1>
                                <h3 class="h2">Dengan Teknisi Terlatih Kami</h3>
                                <p>
                                    Kamu bisa mempercayakan perangkat Applemu kepada kami.
                                    {{-- You are <strong>not permitted</strong> to re-distribute the template ZIP file in any
                                    kind of template collection websites. --}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="{{ asset('ecommerce/assets/image/IMG_0172.png') }}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Nyaman dan Ramah</h1>
                                <h3 class="h2">Menunggu service dengan Nyaman dan Pelayanan yang Ramah </h3>
                                <p>
                                    Bisa menunggu di tempat service kami dengan nyaman.
                                    {{-- If you wish to support TemplateMo, please make a small contribution via PayPal or
                                    tell your friends about our website. Thank you. --}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Kategori Produk Kami</h1>
                <p>
                    Apa yang ada butuhkan akan kami usahakan semaksimal mungkin, selamat menjelajah.
                </p>
            </div>
        </div>
        <div class="row">
            @forelse ($categories as $categ)
                <div class="col-12 col-md-4 p-5 mt-3">
                    {{-- <a href="#"><img src="https://source.unsplash.com/500x500?{{ $categ->name }}" --}}
                    <a href="#"><img src="{{ asset('ecommerce/assets/image/' . $categ->name) . '.jpg' }}"
                            class="rounded-circle img-fluid border"></a>
                    <h5 class="text-center mt-3 mb-3">{{ $categ->name }}</h5>
                    <p class="text-center"><a class="btn btn-success">Go To</a></p>
                </div>
            @empty
            @endforelse



        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Produk Kami</h1>
                    <p>
                        Jelajahi kebutuhan servis Mac-mu dengan produk-produk yang kami sediakan, yang terbaik yang bisa
                        kami persembahkan untukmu.
                    </p>
                </div>
            </div>
            <div class="row">
                @forelse($products as $row)
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                            <a href="{{ url('/product/' . $row->slug) }}">
                                <img src="{{ asset('storage/products/' . $row->image) }}" class="card-img-top"
                                    alt="{{ $row->name }}">
                            </a>
                            <div class="card-body">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    {{-- <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li> --}}
                                    <li class="text-muted text-right">Rp {{ number_format($row->price) }}</li>
                                </ul>
                                <a href="{{ url('/product/' . $row->slug) }}"
                                    class="h2 text-decoration-none text-dark">{{ $row->name }}</a>
                                <p class="card-text">
                                    {!! $row->description !!}
                                </p>
                                {{-- <p class="text-muted">Reviews (24)</p> --}}
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="row text-center py-3">
                        <div class="col-lg-6 m-auto">
                            <p>
                                Produk Belum tersedia
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- End Featured Product -->

    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Postingan Kami</h1>
                <p>
                    Nikmati sajian tulisan kami sebagai sumber untuk mendapat informasi-informasi yang bermanfaat.
                </p>
            </div>
        </div>
        <div class="row">
            @forelse($posts as $row)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="{{ url('/posts/' . $row->slug) }}">
                            <img src="https://source.unsplash.com/400x400?{{ $row->kategory->name }}" class="card-img-top"
                                alt="{{ $row->name }}">
                        </a>
                        <div class="card-body">

                            <a href="{{ url('/product/' . $row->slug) }}"
                                class="h2 text-decoration-none text-dark">{{ $row->title }}</a> <br><br>
                            <small>in <a href="/posts?category={{ $row->kategory->slug }}" class="text-decoration-none">
                                    {{ $row->kategory->name }}</a></small> <br><br>
                            <p class="card-text">
                                {!! $row->excerpt !!}
                            </p>
                            <p class="text-muted">Posted on {{ $row->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>

            @empty
                <div class="row text-center py-3">
                    <div class="col-lg-6 m-auto">

                        <p>
                            Postingan Belum Tersedia.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>
    </section>
    <!-- End Categories of The Month -->
@endsection
