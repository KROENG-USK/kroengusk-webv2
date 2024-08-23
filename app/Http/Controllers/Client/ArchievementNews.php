<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Client\Post;

class ArchievementNews extends Controller
{
    function index(Request $request)
    {
        $request->validate([
            'pageno' => 'integer|min:1'
        ]);

        $pageno = $request->get('pageno', 1);
        $no_of_records_per_page = 5;

        $posts = Post::with(['category', 'subcategory'])
            ->where('Is_Active', 1)
            ->where('beritaPrestasi', 1)
            ->orderBy('id', 'desc')
            ->paginate($no_of_records_per_page, ['*'], 'pageno', $pageno);
        
        $total_pages = $posts->lastPage();
        return view('client.prestasi', [
            'posts' => $posts,
            'total_pages' => $total_pages,
            'pageno' => $pageno,
            'listdivisi' => $this->_componentsClient()['listdivisi'],
            'listdocument' => $this->_componentsClient()['listdocument'],
            'categories' => $this->_componentsClient()['categories'],
            'recentNews' => $this->_componentsClient()['recentNews']
        ]);
    }
}
