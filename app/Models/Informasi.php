<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    protected $table = 'informasi';

    protected $primaryKey = 'id_informasi';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'judul',
        'tanggal',
        'deskripsi',
    ];
}