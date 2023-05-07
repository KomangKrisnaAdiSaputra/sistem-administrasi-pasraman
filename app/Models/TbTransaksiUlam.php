<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbTransaksiUlam extends Model
{
    use HasFactory;
    protected $table = 'tb_transaksi_ulam';
    protected $fillable = [
        'id_transaksi',
        'id_ulam',
        'qty',
    ];

    public function tb_transaksi()
    {
        return $this->belongsTo(TbTransaksi::class, 'id_transaksi');
    }

    public function tb_ulam()
    {
        return $this->belongsTo(TbUlam::class, 'id_ulam');
    }
}
