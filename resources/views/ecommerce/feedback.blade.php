@extends('layouts.ecommerce')

@section('title')
    <title>Kontak Kami - ServicIyan</title>
    <!-- Load map styles -->
    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" /> --}}
@endsection

@section('css')
    <style>
        blockquote {
            background: #f9f9f9;
            border-left: 10px solid #ccc;
            margin: 1.5em 10px;
            padding: 0.5em 10px;
            quotes: "\201C""\201D""\2018""\2019";
        }

        blockquote:before {
            color: #ccc;
            content: open-quote;
            font-size: 4em;
            line-height: 0.1em;
            margin-right: 0.25em;
            vertical-align: -0.4em;
        }

        blockquote p {
            display: inline;
            font-style: italic;
        }

        blockquote h6 {
            font-weight: 700;
            padding: 0;
            margin: 0 0 .25rem;
        }

        blockquote h6 small {
            font-weight: 400;
            padding: 0;
            margin: 0 0 .25rem;
            font-style: italic;
        }

        blockquote h7 {
            font-weight: 300;
            font-size: 0.8em;
            padding: 0;
            margin: 0 0 .25rem;
        }

        .child-comment {
            padding-left: 50px;
        }
    </style>
@endsection

@section('content')
    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Feedback to Us</h1>
            <p>
                Pendapat mereka tentang kami.
            </p>
        </div>

        <div class="col-md-6 m-auto">
            @foreach ($feedback as $row)
                <blockquote>
                    <h6>{{ $row->name }} <small> about {{ $row->subject }}</small></h6>
                    <h7>{{ $row->created_at }}</h7>
                    <hr>
                    <p>{{ $row->message }}</p><br>

                </blockquote>
            @endforeach
        </div>
    </div>
@endsection
@section('js')
@endsection
