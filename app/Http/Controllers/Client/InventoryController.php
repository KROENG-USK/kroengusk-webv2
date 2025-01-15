<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Client\DataInventory;

class InventoryController extends Controller
{
    function details($id) {
        $id = abs((int) $id);

        $dataInventory = DataInventory::where('id', $id)->first();
        $listdivisi    = $this->_componentsClient()['listdivisi'];
        $listdocument  = $this->_componentsClient()['listdocument'];

        if (!$dataInventory) {
            abort(404);
        }

        return view('client.view-inventory', compact('dataInventory', 'listdivisi', 'listdocument'));
    }

    function index()
    {
        $query = DataInventory::all();

        return view('client.inventory', [
            'query' => $query,
            'listdivisi' => $this->_componentsClient()['listdivisi'],
            'listdocument' => $this->_componentsClient()['listdocument']
        ]);
    }
}
