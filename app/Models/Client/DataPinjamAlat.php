<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPinjamAlat extends Model
{
    use HasFactory;

    protected $table = 'table_pinjam';

    public $timestamps = false;

    protected $fillable = [
        'Tanggal',
        'Bataswaktu',
        'Tanggal_pengembalian',
        'NamaLengkap',
        'NIM',
        'NoHp',
        'ListAlat',
        'Lokasi_alat',
        'PostImage',
        'Is_Active'
    ];
}
