@extends('layout.main')
@section('container')
<div class="container mt-3">
    <h1> Daftar Kategori : </h1>
<div class="container mt-4">
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-md-4">
                <a href="/blog?category={{ $category->slug }}">
            <div class="card text-bg-dark">
              <img src="https://source.unsplash.com/500x400?{{ $category->nama }}" class="card-img" alt="...">
                <div class="card-img-overlay d-flex align-items-center justify-content-center">
                  <p class="card-title px-4 py-2" style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->nama }}</p>
                </div>
              </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
</div>
@endsection
