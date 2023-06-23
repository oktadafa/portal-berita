@extends('layout.main')
@section('container')
<div class="container mt-3">
  <h1>Halaman About</h1>
  <li>Nama = {{$nama}}</li>
  <li>Kelas = {{$kelas}}</li>
  <li>Sekolah = {{$sekolah}}</li>
</div>
@endsection