<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbUlam extends Model
{
    use HasFactory;
    protected $table = 'tb_ulam';
    protected $fillable = [
        'id_user',
        'nama_ulam',
        'status',
        'status_vendor',
    ];
}
