<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Client\Beranda;
use App\Models\Client\ContactPage;

class HomeController extends Controller
{
    function index() 
    {
        $slides = Beranda::whereIn('id',  [1, 2, 3, 4])->get();
        $introduction = Beranda::find(5);
        $contact = ContactPage::first();
        $listdivisi = $this->_componentsClient()['listdivisi'];
        $listdocument = $this->_componentsClient()['listdocument'];

        return view('client.home', compact(
            'slides', 
            'introduction', 
            'contact', 
            'listdivisi', 
            'listdocument'
        ));
    }
}
