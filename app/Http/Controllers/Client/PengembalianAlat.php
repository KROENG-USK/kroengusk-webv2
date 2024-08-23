<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\Client\DataPinjamAlat;

class PengembalianAlat extends Controller
{
    function store(Request $request, $pid)
    {
        try {
            $pid = abs((int) $pid);
            $valid = $request->validate([
                'tanggalPengembalian' => 'required|date|max:255',
                'lokasiAlat' => 'required|string|max:255'
            ]);

            $datapinjam = DataPinjamAlat::where('id', $pid)->first();

            if (!$datapinjam) {
                abort(404);
            }

            $datapinjam->update([
                'Tanggal_pengembalian' => $valid['tanggalPengembalian'],
                'Lokasi_alat' => $valid['lokasiAlat'],
                'Is_Active' => 0
            ]);

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            Log::error('Error in update data PengembalianAlat: '. $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    function details($pid) {
        $pid = abs((int) $pid);
        date_default_timezone_set('Asia/Jakarta');
        $currentTime = now();
        $datapinjam = DataPinjamAlat::where('id', $pid)->first();

        if (!$datapinjam) {
            abort(404);
        }

        $informasi = "Alat sedang dipinjam";
        $bataswaktu = $datapinjam->Bataswaktu;

        $statusBatasWaktu = $currentTime >= $bataswaktu ? "Batas Waktu Berakhir ($bataswaktu)" : "$informasi (s/d $bataswaktu)";

        return view('client.view-pengembalian-alat', [
            'dataPinjam' => $datapinjam,
            'statusBatasWaktu' => $statusBatasWaktu,
            'listdivisi' => $this->_componentsClient()['listdivisi'],
            'listdocument' => $this->_componentsClient()['listdocument']
        ]);

    }

    function show()
    {
        $query = DataPinjamAlat::where('Is_Active', 1)->get();

        return view('client.list-data-pengembalian-alat', [
            'query' => $query,
            'listdivisi' => $this->_componentsClient()['listdivisi'],
            'listdocument' => $this->_componentsClient()['listdocument']
        ]);
    }

}
