<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturPengurusan extends Model
{
    use HasFactory;

    protected $table = 'table_struktur';

    protected $guarded = [];
}
