<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\Client\DataPinjamAlat;

class PinjamAlat extends Controller
{
    function post(Request $request)
    {
        try {
            
            date_default_timezone_set('Asia/Jakarta');
        
            $validate = $request->validate([
                'fullname'      => 'required|string|max:255',
                'IDnumber'      => 'required|string|max:50',
                'numberphone'   => 'required|string|max:30',
                'list_alat'     => 'required|string|max:255',
                'batas_waktu'   => 'required|string|max:255',
                'file_img'      => 'required|image|mimes:jpeg,jpg,png,gif|max:2048'
            ]);

             // Cek apakah file ada
            if ($request->hasFile('file_img')) {
                $file = $request->file('file_img');
                $imgnewfile = round(microtime(true)) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('documents/PinjamAlat/postImages'), $imgnewfile);
            } else {
                return response()->json(['success' => false, 'error' => 'No file uploaded'], 400);
            }

            $query = new DataPinjamAlat();
            $query->Tanggal     = now();
            $query->Bataswaktu  = $validate['batas_waktu'];
            $query->NamaLengkap = $validate['fullname'];
            $query->NIM         = $validate['IDnumber'];
            $query->NoHp        = $validate['numberphone'];
            $query->ListAlat    = $validate['list_alat'];
            $query->PostImage   = $imgnewfile;
            $query->Is_Active   = 1;
            $query->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Error in post data'. $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    function index()
    {
        return view('client.pinjam-alat', [
            'listdivisi' => $this->_componentsClient()['listdivisi'],
            'listdocument' => $this->_componentsClient()['listdocument']
        ]);
    }
}
