<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbFaq extends Model
{
    use HasFactory;
    protected $table = 'tb_faq';
    protected $fillable = [
        'id_user',
        'pertanyaan',
        'jawaban',
        'status',
    ];
}
