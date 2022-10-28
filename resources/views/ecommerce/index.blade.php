@extends('layouts.ecommerce')

@section('title')
    <title>ServicIyan - Pusat Service Servis Apple Terbaik</title>
@endsection
@section('css')
    <style>
        :root {
            --ewc-color-1: #ffffff;
            --ewc-color-2: #eae1da;
            --ewc-color-3: #25d366;
            --ewc-color-3-dark: #0bac46;
            --ewc-color-4: #00796a;
        }

        .ewChat {
            position: fixed;
            bottom: 15px;
            right: 30px;
            font-family: "Roboto", sans-serif;
            margin: 0;
            padding: 0;
            width: 320px;
            max-width: calc(100% - 60px);
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            z-index: 11;
        }

        .ewChatBox {
            width: 100%;
            background-color: var(--ewc-color-2);
            border-radius: 15px;
            display: flex;
            transition: opacity 1000ms;
            flex-direction: column;
        }

        .ewChatClose {
            color: var(--ewc-color-1);
            display: none;
            position: absolute;
            top: -35px;
            right: 0;
            border: none;
            padding: 4px;
            border-radius: 100%;
            background-color: var(--ewc-color-4);
        }

        .ewChatClose:hover {
            background-color: var(--ewc-color-3);
        }

        .ewChatCloseMobile {
            width: 100%;
            position: absolute;
            text-align: center;
            color: var(--ewc-color-1);
            top: -300px;
            padding: 100px 0;
            cursor: pointer;
        }

        .ewChatAvatar {
            position: absolute;
            left: calc(50% - 32px);
            top: -80px;
            width: 59px;
            height: 59px;
            padding: 3px;
            border: solid 2px var(--ewc-color-3);
            border-radius: 100%;
            background-color: var(--ewc-color-1);
            display: flex;
        }

        .ewChatAvatar img {
            border-radius: 100%;
        }

        .ewChatHeader {
            background-color: var(--ewc-color-4);
            color: var(--ewc-color-1);
            border-radius: 15px 15px 0 0;
            padding: 12px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .ewChatHeader h3 {
            font-size: 18px;
            margin: 3px;
        }

        .ewChatHeader p {
            font-size: 12px;
            margin: 0;
        }

        .ewChatBubble {
            background-color: var(--ewc-color-1);
            margin: 10px 18px 10px 30px;
            padding: 9px 9px 25px 9px;
            text-align: left;
            border-radius: 0 10px 10px 10px;
            position: relative;
            transition: opacity 1000ms;
        }

        .ewChatBubble:after {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 0;
            height: 0;
            border: 15px solid transparent;
            border-right-color: var(--ewc-color-1);
            border-left: 0;
            border-top: 0;
            margin-top: 0;
            margin-left: -15px;
        }

        .ewChatBubble p {
            margin: 0;
            font-size: 14px;
        }

        .ewChatBubble span {
            position: absolute;
            bottom: 5px;
            right: 9px;
            opacity: 0.5;
            font-size: 11px;
        }

        .ewChatInput {
            display: flex;
            transition: opacity 1000ms;
            width: 100%;
            margin-top: 10px;
            background-color: var(--ewc-color-1);
            height: 48px;
            border-radius: 24px;
        }

        .ewChatInput input {
            font-family: "Roboto", sans-serif;
            font-size: 16px;
            background-color: var(--ewc-color-1);
            height: 32px;
            margin: auto 20px;
            width: 100%;
            border: none;
        }

        .ewChatInput input:focus {
            outline: none;
        }

        .ewChatInput button {
            border: none;
            background-color: var(--ewc-color-4);
            border-radius: 20px;
            margin: 4px;
            color: var(--ewc-color-1);
            padding: 8px;
        }

        .ewChatInput button:hover {
            background-color: var(--ewc-color-3);
        }

        .ewChatDesktop {
            cursor: pointer;
            display: none;
            align-items: center;
            height: 36px;
            border-radius: 25px;
            background-color: var(--ewc-color-3);
            width: 68%;
            padding: 4px 20px;
            font-size: 14px;
            color: var(--ewc-color-1);
            margin-top: 20px;
        }

        .ewChatDesktop svg {
            margin-right: 10px;
        }

        .ewChatMobile {
            cursor: pointer;
            padding: 10px;
            background-color: var(--ewc-color-3);
            display: flex;
            border-radius: 100%;
            color: var(--ewc-color-1);
            border: solid 2px var(--ewc-color-1);
            margin-top: 20px;
        }

        .ewChatMobile:hover,
        .ewChatDesktop:hover {
            background-color: var(--ewc-color-3-dark);
        }

        .ewChatBackdrop {
            position: fixed;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 10;
        }

        /* Responsive */
        @media screen and (min-width: 450px) {
            .ewChatAvatar {
                left: -80px;
                top: 80px;
            }

            .ewChatClose,
            .ewChatDesktop {
                display: flex;
            }

            .ewChatMobile,
            .ewChatCloseMobile {
                display: none;
            }
        }
    </style>
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
                <h1 class="h1">Kategori Servis Kami</h1>
                <p>
                    Apa yang ada butuhkan akan kami usahakan semaksimal mungkin, selamat menjelajah.
                </p>
            </div>
        </div>
        <div class="row">
            @forelse ($categories as $categ)
                <div class="col-12 col-md-4 p-5 mt-3">
                    {{-- <a href="#"><img src="https://source.unsplash.com/500x500?{{ $categ->name }}" --}}
                    <a href="{{ url('/category/' . $categ->slug) }}"><img
                            src="{{ asset('storage/categoryproducts/' . $categ->image) }}"
                            class="rounded-circle img-fluid border"></a>
                    <h5 class="text-center mt-3 mb-3">{{ $categ->name }}</h5>
                    <p class="text-center"><a class="btn btn-success" href="{{ url('/category/' . $categ->slug) }}">Go
                            To</a></p>
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
                    <h1 class="h1">Servis Kami</h1>
                    <p>
                        Jelajahi kebutuhan servis Mac-mu dengan Servis-Servis yang kami sediakan, yang terbaik yang bisa
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
                                Servis Belum tersedia
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
                            <img src="{{ asset('storage/posts/' . $row->image) }}" class="card-img-top"
                                alt="{{ $row->name }}">
                        </a>
                        <div class="card-body">

                            <a href="{{ url('/posts/' . $row->slug) }}"
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

@section('widget')
    {{-- Widget WA --}}

    <div class="ewChat">
        <!-- Chat Box -->
        <div id="ewChatBox" class="ewChatBox ewc_hidden" aria-hidden="true">
            <!-- Tombol Close -->
            <button id="ewChatClose" class="ewChatClose ewc_close">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18"
                    height="18" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29l-4.3 4.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l4.29-4.3l4.29 4.3a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.42z" />
                </svg>
            </button>

            <div class="ewChatCloseMobile ewc_close">
                Ketuk disini untuk menutup
            </div>

            <!-- Avatar -->
            <div class="ewChatAvatar">
                <img alt="" src="{{ asset('ecommerce/assets/img/apple-icon.png') }}" />
                {{-- <img alt=""
                    src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAMDAwMDAwQEBAQFBQUFBQcHBgYHBwsICQgJCAsRCwwLCwwLEQ8SDw4PEg8bFRMTFRsfGhkaHyYiIiYwLTA+PlQBAwMDAwMDBAQEBAUFBQUFBwcGBgcHCwgJCAkICxELDAsLDAsRDxIPDg8SDxsVExMVGx8aGRofJiIiJjAtMD4+VP/AABEIADgAOAMBIgACEQEDEQH/xACDAAABBQEBAQEAAAAAAAAAAAAABAUGBwgBCQIDEAABAwMDAwIFAgcAAAAAAAABAgMEAAURBhIxBxNhIUEIFCJRkRUyF0JicXSB0QEAAwEBAQAAAAAAAAAAAAAABAUGAwIHEQACAgIABgMBAAAAAAAAAAABAgADBBEFEhMhInEUMUEG/9oADAMBAAIRAxEAPwCbtMUtTHpW0zS5LNeitXMg8g+qtRWbR1ocud0dKGgQhCEjc46s8IQn3NZkmfEfeHpi27bpqOGxwH3lqcI87MCudf7jOvXUGFYWTluEw2lCPYuyBvUo+AMU66D0pbbXlBZDrqs7nVDKjWVWHdmpc9Q7Vb5j6gt+YKciqoto2EAdt9zHq19frG+8y1ebTKtncA3Pbg62nzjAVir1CUPNodbUlaFpCkLSchSVDIIP2NQS+dP7RqiyuNOtobeaTllwJwpCqcOlveOjI0J8EPWuTJgLH+OsgY8YNKOF5j5GXbi2DyUbEcZmK2NUlnNtWkgda8UU7usUVQfGi3qyUtN0uS1XGkUvSiiiky5pjLW+kl/xgm3Zw9xpSS6AfQoWGgEjyK7DYu0FZlFGxpG3tlDy9yyT/Mk/TjFXz1GsbTXZvaed7Ud8YzkOHYhX5ODVVy3GzG7Tq8L3BKCeBinWFiYjYxCMyjmDWDevY3EWTZfXkMSAXIIqP36kwnt6gkptDtrjrdZfj7pIMpTCSrB9MIGTk1MtNWX9JtryFZLkibJkOH+p1f8AwV3Skpg2+OlmUl4tNgdstbTxjd+fWph2SlsA849f7nmoD+eT5XGs+0L41M6A+22JccX3Rw7FRm82Ckj0veMTzVFL3kUVd9ASY6kemRTghNRm6X+y6cgKnXafHhRknBdeWEgn7D3J8Cs0a0+KaGwHIukoBfXwJ8xO1seUM8nxupY7qv3NndU+zNSamm2+DZZfzbjaQ8w6hpCyMuK28JB5IrNdsjS5VwYR2w7v9UnOM+DWRL3rXVGo7mbjdbpKlSN5UhalkBrPs2keiB4FPdp6o61tS0fL3Q/R+3uNNuY/IouniFWPg5KBT1HHgfwHUTXV2X8SxbubVVZ8h+nvPSS0RI8VTMdext3tlSGe5vUoJ/cR4Gae3U15l3XqLrK93KNcZd4kmTFz2HGyGe3nnaG8c+9WtY/iY1Vbwhq8QIl0QOXUkx3vynKSalv53Kr4dS9OSoWxrGZnX6bZlRxW35totrJKBQAD+TZTyaKrPRnVzSevHflIanos7YVfKSAApQHOxQyFYoq5ovovrD1uGESsrKdHtMQdTtcT9d6lkzJCyIzClNQWArKG2geR5XyTVb0UVK5Gxv1OR5EE9yTO1+iMZoooRrGKCdKih4sQs/evl0kqFFFLLOzGMU7qPckWm71J03qKHdY/q5DebcCeArB9U/7FFFFKmzsug8tdrKCAdCGrTW42y77z/9k=" /> --}}
            </div>

            <!-- Header -->
            <div class="ewChatHeader">
                <h3>Butuh bantuan? Chat sekarang!</h3>
                <small>
                    <p><small>Ketik pesan kamu dan mulai terhubung</small></p>
                    {{-- <p>dengan kami di WhatsApp</p> --}}
                </small>
            </div>

            <!-- Bubble Chat -->
            <div>
                <div id="ewChatBubble" class="ewChatBubble">
                    <p>
                        Selamat datang di <strong>ServicIyan</strong>, Ada yang bisa dibantu?
                    </p>
                    <span>Sekarang</span>
                </div>
            </div>
        </div>

        <!-- Chat Input -->
        <div id="ewChatInput" class="ewChatInput ewc_hidden" aria-hidden="true">
            <input id="ewc_message" name="ewc_message" type="text" placeholder="Ketik sesuatu. . . ." />
            <button id="ewc_send">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24"
                    height="24" viewBox="0 0 16 16">
                    <g fill="none">
                        <path
                            d="M1.724 1.053a.5.5 0 0 0-.714.545l1.403 4.85a.5.5 0 0 0 .397.354l5.69.953c.268.053.268.437 0 .49l-5.69.953a.5.5 0 0 0-.397.354l-1.403 4.85a.5.5 0 0 0 .714.545l13-6.5a.5.5 0 0 0 0-.894l-13-6.5z"
                            fill="currentColor" />
                    </g>
                </svg>
            </button>
        </div>

        <!-- Tombol Untuk Menampilkan Kotam Chat Desktop -->
        <div id="ewc_desktop_button" class="ewChatDesktop ewc_open">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22"
                    height="22" viewBox="0 0 24 24">
                    <g fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M17.415 14.382c-.298-.149-1.759-.867-2.031-.967c-.272-.099-.47-.148-.669.15c-.198.296-.767.966-.94 1.164c-.174.199-.347.223-.644.075c-.297-.15-1.255-.463-2.39-1.475c-.883-.788-1.48-1.761-1.653-2.059c-.173-.297-.019-.458.13-.606c.134-.133.297-.347.446-.52c.149-.174.198-.298.297-.497c.1-.198.05-.371-.025-.52c-.074-.149-.668-1.612-.916-2.207c-.241-.579-.486-.5-.668-.51c-.174-.008-.372-.01-.57-.01c-.198 0-.52.074-.792.372c-.273.297-1.04 1.016-1.04 2.479c0 1.462 1.064 2.875 1.213 3.074c.149.198 2.095 3.2 5.076 4.487c.71.306 1.263.489 1.694.625c.712.227 1.36.195 1.872.118c.57-.085 1.758-.719 2.006-1.413c.247-.694.247-1.289.173-1.413c-.074-.124-.272-.198-.57-.347zm-5.422 7.403h-.004a9.87 9.87 0 0 1-5.032-1.378l-.36-.214l-3.742.982l.999-3.648l-.235-.374a9.861 9.861 0 0 1-1.511-5.26c.002-5.45 4.436-9.884 9.889-9.884c2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.892 6.993c-.002 5.45-4.436 9.885-9.884 9.885zm8.412-18.297A11.815 11.815 0 0 0 11.992 0C5.438 0 .102 5.335.1 11.892c-.001 2.096.546 4.142 1.587 5.945L0 24l6.304-1.654a11.881 11.881 0 0 0 5.684 1.448h.005c6.554 0 11.89-5.335 11.892-11.893a11.821 11.821 0 0 0-3.48-8.413"
                            fill="currentColor" />
                    </g>
                </svg>
            </div>
            <div>Mulai Obrolan</div>
        </div>

        <!-- Tombol Untuk Menampilkan Kotam Chat Mobile -->

        <div id="ewc_mobile_button" class="ewChatMobile ewc_open">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32"
                height="32" viewBox="0 0 24 24">
                <g fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M17.415 14.382c-.298-.149-1.759-.867-2.031-.967c-.272-.099-.47-.148-.669.15c-.198.296-.767.966-.94 1.164c-.174.199-.347.223-.644.075c-.297-.15-1.255-.463-2.39-1.475c-.883-.788-1.48-1.761-1.653-2.059c-.173-.297-.019-.458.13-.606c.134-.133.297-.347.446-.52c.149-.174.198-.298.297-.497c.1-.198.05-.371-.025-.52c-.074-.149-.668-1.612-.916-2.207c-.241-.579-.486-.5-.668-.51c-.174-.008-.372-.01-.57-.01c-.198 0-.52.074-.792.372c-.273.297-1.04 1.016-1.04 2.479c0 1.462 1.064 2.875 1.213 3.074c.149.198 2.095 3.2 5.076 4.487c.71.306 1.263.489 1.694.625c.712.227 1.36.195 1.872.118c.57-.085 1.758-.719 2.006-1.413c.247-.694.247-1.289.173-1.413c-.074-.124-.272-.198-.57-.347zm-5.422 7.403h-.004a9.87 9.87 0 0 1-5.032-1.378l-.36-.214l-3.742.982l.999-3.648l-.235-.374a9.861 9.861 0 0 1-1.511-5.26c.002-5.45 4.436-9.884 9.889-9.884c2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.892 6.993c-.002 5.45-4.436 9.885-9.884 9.885zm8.412-18.297A11.815 11.815 0 0 0 11.992 0C5.438 0 .102 5.335.1 11.892c-.001 2.096.546 4.142 1.587 5.945L0 24l6.304-1.654a11.881 11.881 0 0 0 5.684 1.448h.005c6.554 0 11.89-5.335 11.892-11.893a11.821 11.821 0 0 0-3.48-8.413"
                        fill="currentColor" />
                </g>
            </svg>
        </div>
    </div>
    <!-- Backdrop -->
    <div class="ewChatBackdrop ewc_hidden"></div>



    {{-- end Widget WA --}}
@endsection

@section('js')
    <script>
        // Ganti nomor WhatsApp berikut dengan nomor kamu
        const NOMOR_WHATSAPP =
            "6285798296177"; //Pastikan nomor diawali dengan kode negara tanpa tanda "+" (cth. 085-XXX-XXX-XXX diubah mendaji 6285-XXX-XXX-XXX)

        const ewc_hidden = document.querySelectorAll(".ewc_hidden");
        const ewc_button = document.querySelectorAll(".ewc_button");
        const ewc_audio = new Audio(
            "https://res.cloudinary.com/xviidev/video/upload/v1642074623/whatsapp-web_tqjtgm.mp3"
        );

        const ewcShow = () => {
            ewc_hidden.forEach((el) => {
                el.style.display = "flex";
                el.ariaHidden = "false";
            });
            ewc_audio.play();

            setTimeout(() => {
                ewc_hidden.forEach((el) => {
                    el.style.opacity = "1";
                });
            }, 0);

            setTimeout(() => {
                document.getElementById("ewChatBubble").style.opacity = "1";
            }, 300);
        };

        const ewcHide = () => {
            ewc_hidden.forEach((el) => {
                el.style.opacity = "0";
                document.getElementById("ewChatBubble").style.opacity = "0";
                el.ariaHidden = "true";
            });

            setTimeout(() => {
                ewc_hidden.forEach((el) => {
                    el.style.display = "none";
                });
            }, 1000);
        };

        function ewcOpen() {
            if (ewChatBox.style.display == "none") {
                ewcShow();
            } else {
                ewcHide();
            }
        }

        document.querySelectorAll(".ewc_close").forEach((el) => {
            el.addEventListener("click", ewcHide);
        });

        document.querySelectorAll(".ewc_open").forEach((el) => {
            el.addEventListener("click", ewcOpen);
        });

        document.getElementById("ewc_send").addEventListener("click", () => {
            window.open(
                `https://wa.me/${NOMOR_WHATSAPP}?text=${encodeURI(
  document.getElementById("ewc_message").value
)}`
            );
        });
    </script>
@endsection
