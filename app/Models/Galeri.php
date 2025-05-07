<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    // Nama tabel secara eksplisit (opsional jika mengikuti konvensi)
    protected $table = 'galeri';

    // Primary key yang digunakan
    protected $primaryKey = 'id_galeri';

    // Jika primary key bukan auto increment integer (defaultnya true)
    public $incrementing = true;

    // Tipe primary key
    protected $keyType = 'int';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'foto',
        'judul',
        'post',
        'tanggal',
    ];

    // Jika Anda tidak menggunakan kolom timestamps
    // public $timestamps = false;
}
