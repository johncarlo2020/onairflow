<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Post $post)
    {
            // Retrieve comments for a specific post along with user names
        $comments = Comment::with('user') // Eager load the user relationship
        ->where('post_id', $post->id)
        ->get();

        // Loop through the comments and retrieve the user name for each comment
        foreach ($comments as $comment) {
        $userName = $comment->user->name; // Access the user relationship and retrieve the user's name
        
        // ... other comment properties
        }

        return($comments);
    }

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->post_id = $post->id;
        $comment->save();

        return response()->json($comment);
    }
}
