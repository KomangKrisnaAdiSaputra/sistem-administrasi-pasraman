<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbTransaksi extends Model
{
    use HasFactory;
    protected $table = 'tb_transaksi';
    protected $fillable = [
        'id_user',
        'kode_transaksi',
        'nama_pelanggan',
        'no_telepon',
        'alamat',
        'email',
        'kategori',
        'sapta_wara',
        'panca_wara',
        'wuku',
        'tanggal_upacara',
        'waktu_upacara',
        'status',
        'tanggal_transaksi',
        'biaya',
        'dp',
        'pelunasan',
        'tanggal_pelunasan',
        'keterangan_upacara',
        'keterangan_cancel',
        'tanggal_banten_pulang'
    ];

    public function tb_user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
