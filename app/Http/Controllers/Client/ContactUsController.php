<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Client\ContactUS;
use App\Models\Client\ContactPage;

class ContactUsController extends Controller
{
    function send(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'nohp' => 'required|string|max:255',
                'message' => 'required|string'
            ]);

            date_default_timezone_set("Asia/Jakarta");

            $query = new ContactUS();
            $query->name        = $request->input('name');
            $query->email       = $request->input('email');
            $query->nohp        = $request->input('nohp');
            $query->message     = $request->input('message');
            $query->datetimemsg = date("Y-m-d G:i:s");
            $query->save();

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            Log::error('Error in send message contactus: '. $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    function index()
    {
        return view('client.contactus', [
            'contact'       => ContactPage::first(),
            'listdivisi'    => $this->_componentsClient()['listdivisi'],
            'listdocument'  => $this->_componentsClient()['listdocument'],
            'categories'    => $this->_componentsClient()['categories'],
            'recentNews'    => $this->_componentsClient()['recentNews']
        ]);
    }
}
