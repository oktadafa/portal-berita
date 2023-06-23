@extends('dashboard.layout.main')
@section('container')

<div class="container mt-3">
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show text-center position-absolute col-md-8" role="alert">
    <i class="bi bi-check-circle-fill"></i>
    <strong class="text-center">{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>My Post</h1>
    </div>

    <a href="/dashboard/posts/create" class="btn btn-primary text-light"><span data-feather="plus" class="align-text-bottom"></span> Create New Post</a>

  <div class="table-responsive mt-4">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Judul</th>
          <th scope="col">Kategori</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->judul }}</td>
            <td>{{ $post->category->nama }}</td>
            <td><a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-success "> <span data-feather="eye" class="align-text-bottom"></span></a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"> <span data-feather="edit" class="align-text-bottom"></span></a>
                <form action="/dashboard/posts/{{ $post->slug }}" class="d-inline" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="badge bg-danger border-0 "><span data-feather="trash-2" class="align-text-bottom" onclick="return confirm('Anda sudah yakin?')"></span></button>
                </form>

            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>

</div>
  @endsection
