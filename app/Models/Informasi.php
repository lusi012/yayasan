<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;


     protected $table = 'informasi';

    // Menetapkan id_galeri sebagai primary key
    protected $primaryKey = 'id_informasi';

        public $incrementing = false;

    // Pastikan key type menggunakan string untuk UUID
    protected $keyType = 'string';

    protected $fillable = [
        'id_informasi',
        'foto',
        'judul',
        'tanggal',
    ];
}
