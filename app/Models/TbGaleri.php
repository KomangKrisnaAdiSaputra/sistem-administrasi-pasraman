<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbGaleri extends Model
{
    use HasFactory;
    protected $table = 'tb_galeri';
    protected $fillable = [
        'id_user',
        'nama_foto',
        'foto',
        'keterangan',
    ];
}
