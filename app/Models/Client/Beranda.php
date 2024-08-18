<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beranda extends Model
{
    use HasFactory;
    
    protected $table = 'table_beranda';

    protected $fillable = [
        'slide', 'judul_slide', 'subjudul_slide', 'deskripsi', 'foto_slide'
    ];
}
