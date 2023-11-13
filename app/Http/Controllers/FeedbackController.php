<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\FeedbackSubmission;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $feedbackSubmissions = FeedbackSubmission::orderBy('created_at', 'desc')->paginate(10);
        return view('feedback.list', compact('feedbackSubmissions'));
    }
    // Method to display the feedback form
    public function create()
    {
        return view('feedback.create');
    }
    // Method to store feedback in the database
    public function store(Request $request)
    {
        $feedback = new FeedbackSubmission();
        $feedback->user_id = 3;
        $feedback->title = $request->title;
        $feedback->description = $request->descrption;
        $feedback->category = $request->category;
        $feedback->save();

        return redirect()->route('home')->with('success', 'Feedback submitted successfully!');
    }
    public function upvote(FeedbackSubmission $feedbackSubmission)
    {
        $feedbackSubmission->increment('votes'); // Increase the vote count
        return back(); // Redirect back to the feedback list
    }
    
    
}
