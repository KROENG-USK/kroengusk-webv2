<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\Client\RepositoryProjectDB;

class RepositoryProject extends Controller
{
    function delete(Request $request)
    {
        try {
            $validate = $request->validate([
                'id' => 'required|integer'
            ]);
    
            $query = RepositoryProjectDB::where('id', $validate['id'])->first();
            
            if (!$query) {
                return response()->json(['success' => false, 'error' => 'data not found']);
            }
    
            $query->update([
                'Is_delete' => 1
            ]);

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            Log::error("error delete RepositoryProject: ". $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    function store(Request $request)
    {
        try {        
            $validate = $request->validate([
                'authorname'   => 'required|string|max:255',
                'projectname'  => 'required|string|max:255',
                'linkgit'      => 'required|string|max:255'
            ]);

            date_default_timezone_set("Asia/Jakarta");

            $query = new RepositoryProjectDB();
            $query->nama_author     = $validate['authorname'];
            $query->nama_project    = $validate['projectname'];
            $query->link_project    = $validate['linkgit'];
            $query->datetime        = date("d-m-Y (G:i:s)");
            $query->Is_delete       = 0;
            $query->save();

            return response()->json(['success' => true]);
        }
        catch (\Exception $e) {
            Log::error("Error store repository: ". $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    function add_page()
    {
        return view('client.list-repository', [
            'listdivisi' => $this->_componentsClient()['listdivisi'],
            'listdocument' => $this->_componentsClient()['listdocument']
        ]);
    }

    function index()
    {
        $query = RepositoryProjectDB::where('Is_delete', 0)->get();

        return view('client.list-repository', [
            'listdivisi' => $this->_componentsClient()['listdivisi'],
            'listdocument' => $this->_componentsClient()['listdocument'],
            'query' => $query
        ]);
    }
}
