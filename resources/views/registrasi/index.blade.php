@extends('layout.main')
@section('container')




<div class="container mt-5 mb-5">
    <h1 class="h3 mb-5 fw-normal text-center">Registrasi</h1>

    <form class="row g-3" action="/registrasi" method="post">
        @csrf
        <div class="col-12">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" class="form-control @error('name')
            is-invalid
            @enderror" id="inputName" placeholder="Your Name" autocomplete="off" required name="name" id="invalidCheck3Feedback" value="{{ old('name') }}">
            @error('name')
            <small><p class="text-danger">{{ $message }}</p></small>
            @enderror
        </div>


        <div class="col-12">
            <label for="inputUsername" class="form-label">Username</label>
            <input type="text" class="form-control @error('username')
                is-invalid
            @enderror" id="inputUsername" placeholder="Your New Username" autocomplete="off" required name="username" value="{{ old('username') }}">
            @error('username')
            <small><p class="text-danger">{{ $message }}</p></small>
            @enderror
        </div>
        <div class="col-12">
          <label for="inputEmail4" class="form-label">Your Email</label>
          <input type="email" class="form-control @error('email')
            is-invalid
          @enderror" id="inputEmail4" placeholder="example@gmail.com" autocomplete="off" required name="email" value="{{ old('email') }}">
          @error('email')
          <small><p class="text-danger">{{ $message }}</p></small>
          @enderror
        </div>
        <div class="col-12">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control @error('password')
                is-invalid
            @enderror" id="inputPassword4" placeholder="Your New Password" required name="password">
            @error('password')
            <small><p class="text-danger">{{ $message }}</p></small>
            @enderror
          </div>
          <div class="d-grid gap-2 mt-4">
            <button class="btn btn-danger" type="submit">Registrasi</button>
          </div>
      </form>
      <small><a href="/login" class="d-flex justify-content-center mt-3">Already have a account?</a></small>
    </main>
</div>




@endsection
