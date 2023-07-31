<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

// Author : Huda Putra Santosa
// NIM : 20104087
// Edited : 27 Juli 2023 11.00 WIB

class BeasiswaController extends Controller
{
    // membuat fungsi untuk menampilakn halaman awal pemilihan jenis beasiswa
    public function index()
    {
        return view('beasiswa.index');
    }

    // membuat fungsi untuk menampilakn halaman pendaftaran beasiswa
    public function daftar_beasiswa()
    {
        return view('beasiswa.create');
    }

    // fungsi untuk melakukan fetch data menggunakan ajax
    public function search_data(Request $req)
    {
        // kondisi jika melakukan request ajax maka akan mencari data dan mencocokannya lalu mengembalikan nilai ipk
        if ($req->ajax()) {
            $nim = $req->input('nim');
            $ipk = Mahasiswa::where('nim', $nim)->pluck('ipk');

            return response()->json($ipk);
        }
    }

    // fungsi untuk memberikan validasi pada input dan lalu mengirimkan data input melalui model untuk menyimpa ke database, jika sesuai akan melakukan redirect ke halaman output
    public function store_beasiswa(Request $request)
    {
        // membuat validasi pada form berdasarkan nama input, serta memberikan message ketidaksesuaian
        $request->validate(
            [
                'nama' => 'required',
                'nim' => 'required|unique:App\Models\Beasiswa,nim',
                'email' => 'required|unique:App\Models\Beasiswa,email',
                'nomor_hp' => 'required',
                'semester' => 'required',
                'beasiswa' => 'required',
                'berkas' => 'required|mimes:pdf,png,jpg,jpeg,zip|max:2048',
                'status_ajuan' => 'required'

            ],
            [
                'nama.required' => 'Nama wajib diisi.',
                'nim.required' => 'NIM wajib di isi.',
                'nim.unique' => 'NIM sudah terdaftar.',
                'email.required' => 'Email wajib diisi.',
                'email.unique' => 'Email sudah digunakan.',
                'nomor_hp.required' => 'Nomor HP wajib diisi.',
                'semester.required' => 'Semester wajib diisi.',
                'beasiswa.required' => 'Beasiswa" wajib diisi.',
                'berkas.required' => 'Berkas wajib diisi.',
                'berkas.mimes' => 'File Berkas tidak sesuai dengan format (PDF/JPG/PNG/ZIP).',
                'berkas.max' => 'Ukuran file Berkas maksimal 2 MB.',
            ]
        );
        // memindahkan file yang diupload ke direktori uploads pada publik path
        $file = $request->berkas;
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName);

        //menginisiasi model beasiswa untuk mengirimkan sebuah atribut input ke sebuah database
        $beasiswa = new Beasiswa();
        $beasiswa->berkas = $fileName;
        $beasiswa->nama = $request->nama;
        $beasiswa->nim = $request->nim;
        $beasiswa->email = $request->email;
        $beasiswa->nomor_hp = $request->nomor_hp;
        $beasiswa->semester = $request->semester;
        $beasiswa->ipk = $request->input('ipk');
        $beasiswa->beasiswa = $request->beasiswa;
        $beasiswa->status_ajuan = $request->status_ajuan;
        $beasiswa->save();
        // melakukan pengembalian hasil ke route hasil beasiswa dengan message success
        return redirect()->route('hasilBeasiswa')->with('success', 'Success Upload');
    }

    // fungsi untuk menampilkan data dari tabel beasiswa dengan ketentuan yang ditampilkan yaitu data terbaru yang baru masuk menggunakan fungsi paginate dengan argumen 1 yang menunjukkan hanya menampilakn 1 data
    public function hasil_beasiswa()
    {

        // menampilkan isi data semua pada table beasiswa
        $beasiswa = Beasiswa::all();
        // menghitung jumlah yang mendaftar beasiswa akademik dan non akdemik
        $akademik = Beasiswa::where('beasiswa', 'Beasiswa Akademik')->count();
        $nonakademik = Beasiswa::where('beasiswa', 'Beasiswa Non-akademik')->count();

        return view('beasiswa.output', compact('beasiswa', 'akademik', 'nonakademik'));
    }
}
