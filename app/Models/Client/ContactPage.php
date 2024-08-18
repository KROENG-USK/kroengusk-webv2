<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPage extends Model
{
    use HasFactory;
    
    protected $table = 'table_contactpage';

    protected $fillable = [
        'email', 'alamat', 'telepon'
    ];
}
