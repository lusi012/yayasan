<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    // Menetapkan id_galeri sebagai primary key
    protected $primaryKey = 'id_galeri';

        public $incrementing = false;

    // Pastikan key type menggunakan string untuk UUID
    protected $keyType = 'string';

    protected $fillable = [
        'id_galeri',
        'foto',
        'judul',
        'tanggal',
    ];
}