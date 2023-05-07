<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbTransaksiBanten extends Model
{
    use HasFactory;
    protected $table = 'tb_transaksi_banten';
    protected $fillable = [
        'id_transaksi',
        'id_banten',
        'qty',
        'banten_pulang',
    ];

    public function tb_transaksi()
    {
        return $this->belongsTo(TbTransaksi::class, 'id_transaksi');
    }

    public function tb_banten()
    {
        return $this->belongsTo(TbBanten::class, 'id_banten');
    }
}
