<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbJenisUpacara extends Model
{
    use HasFactory;
    protected $table = 'tb_jenis_upacara';
    protected $fillable = [
        'id_user',
        'nama_jenis_upacara',
        'status',
    ];
}
