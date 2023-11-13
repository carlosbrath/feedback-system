<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function showComments($id) {
        $feedback_id=$id;
        $data =  Comment::where('feedback_submission_id', $id)->with('user')->get(); 
        return view('include.comments', compact('data', 'feedback_id'));
    }
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->feedback_submission_id = $request->feedback_submission_id;
        $comment->user_id = 3;
        $comment->content = $request->content;
        $comment->save();
        return redirect()->route('home')->with('success', 'Feedback submitted successfully!');
    }
}
