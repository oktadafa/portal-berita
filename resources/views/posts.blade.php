@extends('layout.main')
@section('container')
<div class="container mt-5">


    <h1 class="text-center">Daftar {{ $title }} :</h1>

    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <form action="/blog">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if(request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
                @else

                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if($posts->count())

    <div class="card mb-3 mt-4">
        @if($posts[0]->image)
                    <img src="{{ asset('storage/'.$posts[0]->image) }}" alt="{{ $posts[0]->category->nama }}"  class="card-img-top p-0">

                    @else
                    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->nama }}" class="card-img-top p-0" alt="...">
                    @endif
        {{-- <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->nama }}" class="card-img-top p-0" alt="..."> --}}
        <div class="card-body text-center">
          <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->judul }}</a></h3>
          <p class="fs-6"> <small class="text-muted">By {{ $posts[0]->author->name }} in {{ $posts[0]->category->nama }} {{ $posts[0]->created_at->diffForHumans() }} </small></p>
          <p class="card-text">{!! $posts[0]->excerpt !!}</p>
          <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
        </div>
      </div>


      <div class="row d-flex">
        @foreach ($posts->skip(1) as $post)
      <div class="col-md-4 mb-3">
              <div class="card" style="width: 20rem;">
                  <img src="https://source.unsplash.com/500x400?{{ $post->category->nama }}" class="card-img-top" alt="...">
                  <div class="card-body">
                  <h5 class="card-title">{{ $post->judul }}</h5>
                  <p class="fs-6"> <small class="text-muted">By {{ $post->author->name }} </small></p>
                  <p class="card-text">{{ $post->excerpt}}</p>
                  <p class="card-text"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                  <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More..</a>
                  </div>
              </div>
          </div>
          @endforeach
    </div>
    @else
    <p class="fs-4 text-center text-secondary">Tidak ada Blog</p>
    @endif
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection
