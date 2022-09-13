@extends('layouts.ecommerce')

@section('content my-5')
    <h1 class="mb-5"> Post Category : {{ $category }}</h1>

    @foreach ($posts as $post)
        <article class="mb-5">
            <h2><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
            </h2>
            {{-- <h3>By: {{ $post["author"] }}</h3> --}}
            <p>{{ $post->excerpt }}</p>
        </article>
    @endforeach
@endsection
