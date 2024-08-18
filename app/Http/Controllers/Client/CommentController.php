<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\Client\Comment;

class CommentController {
    function store(Request $request) 
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'comment' => 'required|string'
            ]);

            date_default_timezone_set("Asia/Jakarta");
    
            $comment = new Comment();
            $comment->postId      = $request->input('postId');
            $comment->name        = $request->input('name');
            $comment->email       = $request->input('email');
            $comment->comment     = $request->input('comment');
            $comment->status      = 0;
            $comment->postingDate = date("Y-m-d G:i:s");
            $comment->save();
    
            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            Log::error('Error in storing comment: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}