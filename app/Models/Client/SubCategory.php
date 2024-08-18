<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'table_subcategory';
    protected $primaryKey = 'SubCategoryId';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'CategoryId',
        'Subcategory',
        'SubCatDescription',
        'PostingDate',
        'UpdationDate',
        'Is_Active'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'SubCategoryId', 'SubCategoryId');
    }
}
