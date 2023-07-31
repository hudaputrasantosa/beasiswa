<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Author : Huda Putra Santosa
// NIM : 20104087
// Edited : 27 Juli 2023 11.00 WIB

class Beasiswa extends Model
{
    use HasFactory;
    // menetapkan sebuah relasi ke tabel beasiswa di database
    protected $table = "beasiswa";
    // menentukan atribut primary key pada tabel
    protected $primaryKey = "id_beasiswa";
    // membuat atribut yang harus di isi pada tabel beasiswa
    protected $fillable = [
        'nama',
        'nim',
        'email',
        'nomor_hp',
        'semester',
        'ipk',
        'beasiswa',
        'berkas',
        'status_ajuan',
    ];
}
