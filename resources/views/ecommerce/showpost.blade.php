@extends('layouts.ecommerce')

@section('title')
    <title>Postingan {{ $post->name }}</title>
@endsection

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ $post->title }}</a>
                    <article class="mb-5">


                </h2>
                {{-- <h3>By: {{ $post["author"] }}</h3> --}}
                {{-- <p>by <a href="/posts?author={{ $post->author->username }}"
                    class="text-decoration-none">{{ $post->author->name }} </a> in --}}
                <a href="/posts?category={{ $post->kategory->slug }}"
                    class="text-decoration-none">{{ $post->kategory->name }}</a></p>
                <img src="{{ asset('storage/posts/' . $post->image) }}" class="card-img-top" alt="{{ $post->name }}">
                {{-- <img src="https://source.unsplash.com/1200x400?{{ $post->kategory->name }}" class="card-img-top img-fluid"
                    alt="{{ $post->kategory->name }}"> --}}
                <p>{!! $post->body !!}</p>
                </article>

                <a href="/posts" class="btn btn-success">back to post</a>
            </div>
        </div>
    </div>
@endsection
