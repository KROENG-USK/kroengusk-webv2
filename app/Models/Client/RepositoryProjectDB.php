<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepositoryProjectDB extends Model
{
    use HasFactory;

    protected $table = 'table_repository';
    
    public $timestamps = false;
    
    protected $fillable = [
        'nama_author',
        'nama_project',
        'link_project',
        'datetime',
        'Is_delete'
    ];
    
}
