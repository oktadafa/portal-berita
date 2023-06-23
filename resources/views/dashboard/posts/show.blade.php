@extends('dashboard.layout.main')
@section('container')
<div class="container mt-4">
    <div class="row justify-content-center ms-4">
        <div class="col-md-8">
                <h1 class="text-center">{{ $post->judul}}</h1>
                <div class="container ms-3 my-3">
                <a href="/dashboard/posts/" class="btn btn-success text-decoration-none"><span data-feather="corner-down-left" class="align-text-bottom"></span> Back to my post
               </a>
               <a href="#" class="btn btn-warning text-decoration-none"><span data-feather="edit" class="align-text-bottom"></span>Edit
               </a>
               <a href="#" class="btn btn-danger text-decoration-none"><span data-feather="x-circle" class="align-text-bottom"></span> Delete
               </a>
            </div>
               <br>
                    @if($post->image)
                    <div style="max-width:800px;max-height:400px;overflow:hidden;border-bottom:2px solid green;border-top:2px solid blue">
                    <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->category->nama }}">
                </div>
                    @else
                    <img src="https://source.unsplash.com/800x400?{{ $post->category->nama }}" alt="{{ $post->category->nama }}">
                    @endif

        <article class="fs-5 mt-3">
            {!! $post->isi !!}
        </article>
            </div>
    </div>

@endsection
