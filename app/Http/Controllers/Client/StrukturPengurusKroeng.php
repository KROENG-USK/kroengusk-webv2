<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Client\StrukturPengurusan;

class StrukturPengurusKroeng extends Controller
{
    function index()
    {
        $struktur = StrukturPengurusan::all();

        return view('client.struktur-komunitas', [
            'struktur' => $struktur,
            'listdivisi' => $this->_componentsClient()['listdivisi'],
            'listdocument' => $this->_componentsClient()['listdocument']
        ]);
    }
}
