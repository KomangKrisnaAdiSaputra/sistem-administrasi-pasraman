<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbTestimoni extends Model
{
    use HasFactory;
    protected $table = 'tb_testimoni';
    protected $fillable = [
        'id_user',
        'nama_testimoni',
        'keterangan',
        'status',
    ];
}
