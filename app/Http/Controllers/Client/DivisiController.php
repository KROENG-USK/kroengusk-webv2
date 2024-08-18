<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client\Divisi;


class DivisiController extends Controller
{
    private $listdivisi;
    private $listdocument;

    private function valid($str)
    {
        $str = trim($str);
        $str = stripslashes($str);
        $str = strip_tags($str);
        $str = htmlspecialchars($str);
        return $str;
    }

    private function selectDivisi($id, $divisi) {
        $query = Divisi::where('id', $id)->where('divisi', $divisi)->first();
        if ($query) {
            return $query;
        }
        else {
            return abort(404);
        }
    }

    function __construct()
    {
        $this->listdivisi = $this->_componentsClient()['listdivisi'];
        $this->listdocument = $this->_componentsClient()['listdocument'];
    }

    function show($id, $divisi)
    {
        if (!$id) {
            return abort(404);
        }
        
        return view('client.divisi', [
            'divisi' => $this->selectDivisi(abs($id), $this->valid($divisi)),
            'listdivisi' => $this->listdivisi,
            'listdocument' => $this->listdocument
        ]);
    }
}
