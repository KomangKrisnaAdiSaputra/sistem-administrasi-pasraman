<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbBanten extends Model
{
    use HasFactory;
    protected $table = 'tb_banten';
    protected $fillable = [
        'id_user',
        'nama_banten',
        'status',
        'status_vendor',
    ];
}
