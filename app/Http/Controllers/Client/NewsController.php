<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client\Post;
use App\Models\Client\Comment;

class NewsController extends Controller
{
    private function valid($str)
    {
        $str = htmlspecialchars($str);
        $str = strip_tags($str);
        $str = trim($str);
        $str = stripslashes($str);
        return $str;
    }

    function show($nid, $page)
    {
        $nid = abs((int) $nid);
        $page = $this->valid($page);

        $post = Post::where('id', $nid)->where('PostUrl', $page)->first();
        
        if (!$post) {
            abort(404);
        }

        $comments = Comment::where('postId', $nid)
            ->where('status', 1)->get();

        return view('client.news', [
            'post' => $post,
            'page' => $page,
            'comments' => $comments,
            'listdivisi' => $this->_componentsClient()['listdivisi'],
            'listdocument' => $this->_componentsClient()['listdocument'],
            'categories' => $this->_componentsClient()['categories'],
            'recentNews' => $this->_componentsClient()['recentNews']
        ]);
    }

    function index(Request $request)
    {
        $request->validate([
            'pageno' => 'integer|min:1'
        ]);
        
        $pageno = $request->query('pageno', 1);
        $no_of_records_per_page = 5;
        $offset = ($pageno - 1) * $no_of_records_per_page;

        $posts = Post::with('category', 'subcategory')
            ->where('Is_Active', 1)
            ->orderBy('id', 'desc')
            ->skip($offset)
            ->take($no_of_records_per_page)
            ->get();

        $total_posts = Post::where('Is_Active', 1)->count();
        $total_pages = ceil($total_posts / $no_of_records_per_page);

        return view('client.news', [
            'posts' => $posts,
            'pageno' => $pageno,
            'total_pages' => $total_pages,
            'listdivisi' => $this->_componentsClient()['listdivisi'],
            'listdocument' => $this->_componentsClient()['listdocument'],
            'categories' => $this->_componentsClient()['categories'],
            'recentNews' => $this->_componentsClient()['recentNews']
        ]);
    }
}
