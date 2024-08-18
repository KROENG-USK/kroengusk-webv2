<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotFound extends Controller
{
    public function index()
    {
        return view('includes.error.404page', [
            'listdivisi' => $this->_componentsClient()['listdivisi'],
            'listdocument' => $this->_componentsClient()['listdocument'],
            'categories' => $this->_componentsClient()['categories'],
            'recentNews' => $this->_componentsClient()['recentNews']
        ]);
    }
}
