@extends('layout.app')

@section('title', 'Daftar Beasiswa')

@section('content')
<main class="container">
    <div class="py-5 text-center">
      <h2>Daftar Beasiswa</h2>
    </div>

    <div class="row d-flex justify-content-center align-items-center pb-5">
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Registrasi Beasiswa</h4>
        <form action="{{ route('prosesBeasiswa') }}" enctype="multipart/form-data" method="POST">
          @csrf

          <div class="col-12">
              <label class="form-label">NIM</label>
              <input type="number" class="form-control" name="nim" id="nim" value="{{ old('nim') }}" required>
                @error('nim') <label class="text-danger">{{ $message }}</label> @enderror
            </div>

          <div class="row g-3">
            <div class="col-12">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="{{ old('nama') }}"  required>
               @error('nama') <label class="text-danger">{{ $message }}</label> @enderror
            </div>

            <div class="col-12">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="nama@gmail.com" required>
               @error('email') <label class="text-danger">{{ $message }}</label> @enderror
            </div>

            <div class="col-12">
              <label class="form-label">No HP</label>
              <input type="number" class="form-control" name="nomor_hp" value="{{ old('nomor_hp') }}" placeholder="contoh : 6285156890287" required>
                @error('nomor_hp') <label class="text-danger">{{ $message }}</label> @enderror
            </div>
           
             <div class="col-12">
              <label class="form-label">Semester</label>
              <select class="form-select" name="semester" required>
                <option value="1">Pilih Semester ...</option>
                <option value="1">1</option>
                <option value="2">2</option>  
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
              </select>
                @error('semester') <label class="text-danger">{{ $message }}</label> @enderror
            </div>
           

            {{-- <fieldset disabled> --}}
            <div class="col-12">
              <label class="form-label">IPK Terakhir</label>
              <input type="text" class="form-control" name="ipk" id="ipk" value="{{ old('ipk') }}" readonly>
                @error('ipk') <label class="text-danger">{{ $message }}</label> @enderror
            </div>
            {{-- </fieldset> --}}
       
            {{-- <fieldset  @if($ipk<3.0) disabled @endif> --}}
              <div class="col-12">
              <label class="form-label">Pilihan Beasiswa</label>
              <select class="form-select" name="beasiswa" id="beasiswa" required>
                <option value="Beasiswa Akademik">Pilih Beasiswa ...</option>
                <option value="Beasiswa Akademik">Beasiswa Akademik</option>
                <option value="Beasiswa Non-akademik">Beasiswa Non-akademik</option>  
              </select>
                @error('beasiswa') <label class="text-danger">{{ $message }}</label> @enderror
            </div>
             {{-- </fieldset> --}}

             {{-- <fieldset @if("$('#ipk').val() < 3") disabled @endif> --}}
            <div class="col-12">
              <label class="form-label">Upload Berkas Syarat</label>
              <input class="form-control" type="file" name="berkas" id="berkas">
            </div>
              @error('berkas') <label class="text-danger">{{ $message }}</label> @enderror
            {{-- </fieldset> --}}

            <input type="hidden" class="form-control" name="status_ajuan" value="Belum di verifikasi" required>

          <hr class="my-4">
<div class="row d-flex justify-content-center align-items-center">
 <button class="col-5 btn btn-primary btn-lg mx-auto" id="daftar" type="submit">Daftar</button>
          <a href="{{ url()->previous() }}" class="col-5 btn btn-danger btn-lg mx-auto">Batal</a>
</div>
         
        </form>
      </div>
    </div>
  </main>
  @endsection

@section('js')
 <script type="text/javascript">
    $('#nim').on('input', function(){
      var nim = $(this).val();
      // searchIpk(nama);
      console.log(nim);

        $.ajax({
        url: '/search-data',
        type: 'POST',
        dataType : 'json',
        data : {
          nim : nim,
          '_token' : '{{ csrf_token() }}'
        },
        success : function(response){
         if(response[0] < 3 ){
          $('#ipk').val(response);
          $('#beasiswa').attr('disabled', 'disabled');
          $('#berkas').attr('disabled', 'disabled');
          $('#daftar').attr('disabled', 'disabled');
         } else{
          $('#ipk').val(response);
         }        
        },
         error: function(error) {
        // Tambahkan kode untuk menangani kesalahan jika diperlukan
        console.log(error);
      }
    });
    });
  </script>

@endsection

