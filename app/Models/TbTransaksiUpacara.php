<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbTransaksiUpacara extends Model
{
    use HasFactory;
    protected $table = 'tb_transaksi_upacara';
    protected $fillable = [
        'id_transaksi',
        'id_upacara',
        'qty_upacara'
    ];

    public function tb_transaksi()
    {
        return $this->belongsTo(TbTransaksi::class, 'id_transaksi');
    }

    public function tb_upacara()
    {
        return $this->belongsTo(TbUpacara::class, 'id_upacara');
    }
}
