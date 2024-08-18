<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'table_posts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'PostTitle',
        'PostImage',
        'CategoryId',
        'SubCategoryId',
        'PostDetails',
        'PostingDate',
        'PostUrl',
        'Is_Active'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryId', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'SubCategoryId', 'SubCategoryId');
    }
}
