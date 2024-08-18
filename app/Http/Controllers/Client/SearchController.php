<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client\Post;

class SearchController extends Controller
{
    function search(Request $request)
    {
        $request->validate([
            'searchtitle' => 'required|string|max:225',
            'pageno' => 'integer|min:1'
        ]);

        $searchtitle = $request->input('searchtitle');
        $pageno = $request->query('pageno', 1);
        $no_of_records_per_page = 3;
        $offset = ($pageno - 1) * $no_of_records_per_page;

        // Get total pages
        $total_rows = Post::where('PostTitle', 'like', "%$searchtitle%")
            ->where('Is_Active', 1)
            ->count();
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        // Fetch search result
        $posts = Post::with('category', 'subcategory')
            ->where('PostTitle', 'like', "%$searchtitle%")
            ->where('Is_Active', 1)
            ->skip($offset)
            ->take($no_of_records_per_page)
            ->get();

        return view('client.search', [
            'listdivisi'    => $this->_componentsClient()['listdivisi'],
            'listdocument'  => $this->_componentsClient()['listdocument'],
            'categories'    => $this->_componentsClient()['categories'],
            'recentNews'    => $this->_componentsClient()['recentNews'],
            'posts'         => $posts,
            'searchTitle'   => $searchtitle,
            'total_pages'   => $total_pages,
            'pageno'        => $pageno
        ]);
    }
}
