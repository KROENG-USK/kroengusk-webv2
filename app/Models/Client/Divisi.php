<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $table = "table_divisi";
    protected $fillable = ['divisi', 'img_kadiv', 'nama_lengkap', 'jobdesk', 'file_anggota'];
}
