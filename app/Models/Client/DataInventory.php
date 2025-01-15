<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataInventory extends Model
{
    use HasFactory;

    protected $table = 'table_inventory';
    protected $fillable = [
        'nama_barang',
        'jumlah',
        'dipinjam',
        'foto_barang'
    ];

    public $timestamps = false;

    
}
