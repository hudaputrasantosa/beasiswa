 <header class="d-flex justify-content-center py-4 bg-primary-subtle text-emphasis-info">
      <ul class="nav nav-pills">
        <li class="nav-item mx-auto"><a href="{{ route('pilihBeasiswa') }}" class="nav-link  @if(Request::is('/')) active fw-bold @endif">Pilihan Beasiswa</a></li>
        <li class="nav-item mx-auto"><a href="{{ route('daftarBeasiswa') }}" class="nav-link  @if(Request::is('daftar-beasiswa')) active fw-bold @endif">Daftar Beasiswa</a></li>
        <li class="nav-item mx-auto"><a href="{{ route('hasilBeasiswa') }}" class="nav-link @if(Request::is('hasil-beasiswa')) active fw-bold @endif">Hasil Pendaftaran Beasiswa</a></li>
      </ul>
    </header>
