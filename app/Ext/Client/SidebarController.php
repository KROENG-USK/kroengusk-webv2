<?php

namespace App\Ext\Client;

use Illuminate\Http\Request;

use App\Models\Client\Post;
use App\Models\Client\Category;

class SidebarController
{
    public static function get()
    {
        $categories = Category::all();
        $recentNews = Post::with('category')
            ->where('Is_Active', 1)
            ->orderBy('id', 'desc')
            ->take(8)
            ->get();

        return [
            'categories' => $categories,
            'recentNews' => $recentNews
        ];
    }
}
