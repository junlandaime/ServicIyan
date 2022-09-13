@extends('layouts.ecommerce')

@section('content')

    <h1 class="my-5 text-center">{{ $title }}</h1>


    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('kategory'))
                    <input type="hidden" name="kategory" value="{{ request('kategory') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-dark" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    {{-- @dd($posts) --}}
    @if ($posts->count())
        <div class="container">
            <div class="card mb-3">
                <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->kategory->name }}" class="card-img-top"
                    alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title"><a href="/posts/{{ $posts[0]->slug }}"
                            class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h5>
                    <p>
                        <small class="text-muted">
                            {{-- By: <a href="/posts?author={{ $posts[0]->author->username }}"                            class="text-decoration-none">{{ $posts[0]->author->name }} </a> --}}
                            in <a href="/posts?category={{ $posts[0]->kategory->slug }}" class="text-decoration-none">
                                {{ $posts[0]->kategory->name }}</a>
                            {{ $posts[0]->created_at->diffForHumans() }}
                        </small>
                    </p>
                    <p class="card-text">{{ $posts[0]->excerpt }}</p>

                    <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
                </div>
            </div>
        </div>




        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute px-3 py-2 text-white"
                                style="background-color: rgba(0, 0, 0, 0.7)"><a
                                    href="/posts?category={{ $post->kategory->slug }}"
                                    class="text-white text-decoration-none">{{ $post->kategory->name }}</a></div>
                            <img src="https://source.unsplash.com/400x300?{{ $post->kategory->name }}" class="card-img-top"
                                alt="{{ $post->kategory->name }}">
                            <div class="card-body">
                                <h5 class="card-title"><a href="/posts/{{ $post->slug }}"
                                        class="text-decoration-none">{{ $post->title }}</a></h5>
                                <small class="text-muted">
                                    {{-- By: <a href="/posts?author={{ $post->author->username }}"                                        class="text-decoration-none">{{ $post->author->name }} </a> --}}
                                    in <a href="/posts?category={{ $post->kategory->slug }}" class="text-decoration-none">
                                        {{ $post->kategory->name }}</a>
                                    {{ $posts[0]->created_at->diffForHumans() }}
                                </small>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="/posts/{{ $post->slug }}" class="btn btn-success">Go More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-end">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    @else
        <p class="text-center fs-4">No Post Found.</p>
    @endif



@endsection
