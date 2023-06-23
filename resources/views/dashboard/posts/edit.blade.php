@extends('dashboard.layout.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Create Post</h1>
</div>

<div class="col-lg-8">
<form method="post" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
    @method('patch')
    @csrf

    <input type="hidden" name="oldImage" value="{{ asset($post->image) }}">
    <div class="mb-3">
      <label for="judul" class="form-label">Judul</label>
      <input type="text" class="form-control @error("judul")
        is-invalid
      @enderror" id="judul" name="judul" value="{{ old('judul', $post->judul) }}" required>
      @error("judul")
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control  @error("slug")
        is-invalid
        @enderror" id="slug" name="slug" value="{{old('slug',$post->slug)  }}" required>
        @error("slug")
            <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-3">
        <label for="gambar" class="form-label">Pilih Gambar</label>
        <input class="form-control @error('image')
            is-invalid
        @enderror " type="file" id="gambar" multiple name="image" >
        @if($post->image)
        <img src="{{  asset('storage/' . $post->image) }}"class="img-preview img-fluid my-3" alt="">
        @else
        <img class="img-preview img-fluid my-3" alt="">
        @endif
        @error("image")
        <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>

    <div class="mb-3">
        <label for="category">Category</label>
        <select class="form-select" id="category" name="category_id" >
            @foreach ($categories as $category)
            @if(old('category_id', $post->category_id) == $category->id)
            <option value="{{ $category->id }}" selected>{{ $category->nama }}</option>
            @else
            <option value="{{ $category->id }}">{{ $category->nama }}</option>
            @endif
            @endforeach
        </select>
        @error("category_id")
        <p class="text-danger">{{ $message }}</p>
    @enderror
    </div>

      <div class="mb-3">
            <label for="body">Body</label>
            <input id="body" type="hidden" name="isi" value="{{ $post->isi }}">
            <trix-editor input="body"></trix-editor>
            @error("isi")
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<script src="/js/jquery.js">

</script>
<script>
    $(document).ready(function(){
        $("#judul").change(function(){
            const judul = $("#judul").val()
            $.ajax({
                url : "/dashboard/posts/checkSlug?judul=" + judul,
                dataType : "json",
                success : function(data){
                    $("#slug").val(data.slug)
                }
            })
        })

        $("#gambar").on('change', function(){
            const image = $('#gambar')
            const preview = $('.img-preview')


            preview.css('display','block')
            const oFReader = new FileReader()
            oFReader.readAsDataURL(image[0].files[0])

            oFReader.onload = function(event){
                // preview.src = event.target.result
                preview.attr('src', event.target.result)
            }
        })
})
</script>
@endsection
