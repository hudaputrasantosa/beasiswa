@extends('layout.app')

@section('title', 'Pilihan Beasiswa')

@section('content')
<div class="container">

    <img src="{{ asset('images/beasiswa.png') }}" class="img-fluid" alt="...">

<main class="container py-3">
  <div class="bg-body-tertiary p-4 rounded">
    <h1>Beasiswa Akademik</h1>
    <p>Beasiswa akademik adalah bentuk bantuan keuangan yang diberikan kepada pelajar atau mahasiswa yang telah mencapai tingkat prestasi akademik tertentu.</p>
    <a class="btn btn-lg btn-primary" href="{{ route('daftarBeasiswa') }}" role="button">Daftar &raquo;</a>
  </div>
</main>
<br>
<main class="container py-3">
  <div class="bg-body-tertiary p-4 rounded">
    <h1>Beasiswa Non-Akademik</h1>
    <p>Beasiswa non-akademik adalah bentuk bantuan keuangan yang diberikan kepada pelajar atau mahasiswa berdasarkan prestasi atau kriteria non-akademik.</p>
    <a class="btn btn-lg btn-primary" href="{{ route('daftarBeasiswa') }}" role="button">Daftar &raquo;</a>
  </div>
</main>
</div>
@endsection