@extends('dashboard.layout.main')
@section('container')


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Post Categories</h1>
    </div>

    <a href="/dashboard/categories/create" class="btn btn-primary text-light"><span data-feather="plus" class="align-text-bottom"></span> Create New Category</a>

  <div class="table-responsive mt-4 col-lg-6">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Category Name</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->nama }}</td>
            <td>
                <a href="/dashboard/posts/{{ $category->slug }}/edit" class="badge bg-warning"> <span data-feather="edit" class="align-text-bottom"></span></a>
                <form action="/dashboard/posts/{{ $category->slug }}" class="d-inline" method="post">
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
  @endsection
