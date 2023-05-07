<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbUpacara extends Model
{
    use HasFactory;
    protected $table = 'tb_upacara';
    protected $fillable = [
        'id_jenis_upacara',
        'id_user',
        'nama_upacara',
        'status',
        'status_vendor',
    ];

    public function tb_jenis_upacara()
    {
        return $this->belongsTo(TbJenisUpacara::class, 'id_jenis_upacara');
    }
}
