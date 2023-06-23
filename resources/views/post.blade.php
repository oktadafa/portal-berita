@extends('layout.main')
@section('container')

    <div class="container mt-4">
<div class="row justify-content-center">
    <div class="col-md-8">
            <h1 class="text-center">{{ $post->judul}}</h1>
            @if($post->image)
            <div style="max-width:800px;max-height:400px;overflow:hidden;border-bottom:2px solid green;border-top:2px solid blue">
            <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->category->nama }}">
        </div>
            @else
            <img src="https://source.unsplash.com/800x400?{{ $post->category->nama }}" alt="{{ $post->category->nama }}">
            @endif
            <p class="text-center mt-3"><small class="text-muted">By :
                 <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none text-body-secondary">
                    {{ $post->author->name }}
                </a>
                in
                <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none text-body-secondary">
                    {{ $post->category->nama }}
                </a>
                {{ $post->created_at->diffForHumans() }}
            </small>
        </p>
    <article class="fs-6">
        {!! $post->isi !!}
    </article>
    <a href="/blog/"> <div class="btn btn-primary my-3">Back </div></a>
        </div>
</div>



    </div>
@endsection
