<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'table_category';
    protected $primaryKey = 'id';

    protected $fillable = [
        'CategoryName',
        'Description',
        'PostingDate',
        'UpdationDate',
        'Is_Active'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'CategoryId', 'id');
    }
}
