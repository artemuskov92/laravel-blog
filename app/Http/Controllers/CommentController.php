<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $this->validate($request,[
            'text'=>'required'
        ]);

        $comment = new Comment;
        $comment->text = $request->get('text');
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->get('post_id');
        $comment->save();

        return redirect()->back()->with('status', 'Your comment is added in site, after approval the admin !');
    }
}
