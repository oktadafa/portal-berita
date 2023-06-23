@extends('layout.main')
@section('container')

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <i class="bi bi-check-circle-fill"></i>
    <strong class="text-center">{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
    <i class="bi bi-x-circle-fill"></i>
    <strong class="text-center">{{ session('error') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<main class="form-signin w-100 m-auto mt-5">
    <form method="post" action="/login">
        @csrf
      <h1 class="h3 mb-5 fw-normal text-center">Please Login</h1>
      <div class="form-floating">
        <input type="name" class="form-control" id="floatingName" placeholder="Username" name="username" required autofocus>
        <label for="floatingName">Username</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required autofocus>
        <label for="floatingPassword">Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-danger" type="submit">Sign in</button>
    </form>
    <small><a href="/registrasi" class="d-flex justify-content-center mt-3">Don't have account?</a></small>
  </main>


@endsection
