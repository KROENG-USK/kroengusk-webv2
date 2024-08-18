<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'table_comments'; // Specify the table name if not following Laravel conventions
    protected $fillable = ['postId', 'name', 'email', 'comment', 'status', 'postingDate'];

    public $timestamps = false;

    // Optional: If you want to specify date fields explicitly
    protected $dates = ['postingDate'];

    public function post() {
        return $this->belongsTo(Post::class, 'postId', 'id');
    }
}