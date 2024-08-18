<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client\Category;
use App\Models\Client\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function show($catid, $page = 1)
    {
        $catid = abs((int) $catid);
        $category = Category::findOrFail($catid);
        if (!$category) {
            abort(404);
        }

        return view('client.category.show', compact('category', 'page'));
    }

    function index(Request $request, $catid)
    {
        $request->validate([
            'pageno' => 'integer|min:1'
        ]);
        $catid = abs((int) $catid);
        // $catid = $request->input('catid');
        $pageno = $request->input('pageno', 1);
        $no_of_records_per_page = 8;
        $offset = ($pageno - 1) * $no_of_records_per_page;

        $category = Category::findOrFail($catid);
        if (!$category) {
            abort(404);
        }

        $total_rows = Post::where('Is_Active', 1)
            ->where('CategoryId', $catid)
            ->count();
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $posts = Post::with('category', 'subcategory')
            ->where('Is_Active', 1)
            ->where('CategoryId', $catid)
            ->orderBy('id', 'desc')
            ->skip($offset)
            ->take($no_of_records_per_page)
            ->get();

        return view('client.category', [
            'category'      => $category,
            'categories'    => $this->_componentsClient()['categories'],
            'posts'         => $posts,
            'pageno'        => $pageno,
            'total_pages'   => $total_pages,
            'recentNews'    => $this->_componentsClient()['recentNews'],
            'listdivisi'    => $this->_componentsClient()['listdivisi'],
            'listdocument'  => $this->_componentsClient()['listdocument'],
        ]);
    }
}
