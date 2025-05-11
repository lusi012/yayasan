<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    protected $fillable = [
        'id_galeri',
        'foto',
        'judul',
        'tanggal',
    ];

    public $incrementing = false;  // Karena menggunakan UUID
    protected $keyType = 'string';
}
