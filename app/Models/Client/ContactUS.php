<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUS extends Model
{
    use HasFactory;

    protected $table = 'table_contact';
    protected $fillable = ['name', 'email', 'nohp', 'message', 'datetimemsg'];

    public $timestamps = false;
}
