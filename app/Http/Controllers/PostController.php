<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use App\Events\PostLiked;
use App\Events\PostDisliked;

use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        foreach ($posts as $post) {
            $likesCount = $post->likedPosts()->count(); 
            $post->likes_count = $likesCount;

            $commentsCount = $post->comments()->count(); 
            $post->comments_count = $commentsCount;

            $currentUser = Auth::user(); 
            if ($currentUser) {
                $hasLiked = $post->likes()->where('user_id', $currentUser->id)->where('like',true)->exists();
                $post->has_liked = $hasLiked;
            }
        }
        return view('dashboard',compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
          // Validate the input data
          $request->validate([
            'content' => 'required|max:255',
            // Add validation rules for other input fields, such as 'image'
        ]);

        // Create a new post
        $post = new Post();
        $post->user_id = auth()->id(); // Assuming the user is authenticated
        $post->content = $request->input('content');
        // Set other attributes, such as 'image', based on input data

        // Save the post to the database
        $post->save();

        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'Post created successfully!');
   
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // Validate input
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Update post
        $post = Post::findOrFail($id);
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }

    public function likePost($postId)
    {

        $post = Post::find($postId);
        $currentUser = Auth::user();
        $action;
        $existinglike = Like::where('post_id', $postId)
                                ->where('user_id', $currentUser->id)
                                ->where('like', true)
                                ->where('dislike', false)
                                ->exists();
        if (!$existinglike) {
                $existingDislike = Like::where('post_id', $postId)
                ->where('user_id', $currentUser->id)
                ->where('like', false)
                ->where('dislike', true)
                ->exists();
                
                if(!$existingDislike){
                    $like = new Like();
                    $like->post_id = $postId;
                    $like->user_id = $currentUser->id;
                    $like->like = true;
                    $like->dislike = false;
                    $like->save();
                    
                    $likesCount = $post->likedPosts()->count(); 
                    $post->likes_count = $likesCount;
                    $event = event(new PostLiked($post, $post->likes_count));

                    $action = 'like';
                }else{
                    $like = Like::where('post_id', $postId)
                                ->where('user_id', $currentUser->id)
                                ->first();
                                
                    $like->like = true;
                    $like->dislike = false;
                    $like->save();

                    $likesCount = $post->likedPosts()->count(); 
                    $post->likes_count = $likesCount;

                    $event = event(new PostLiked($post, $post->likes_count));
                    $action = 'like';

                }
        }else{
            $like = Like::where('post_id', $postId)
                                ->where('user_id', $currentUser->id)
                                ->first();
                    $like->like = false;
                    $like->dislike = true;
                    $like->save();

                    $likesCount = $post->likedPosts()->count(); 
                    $post->likes_count = $likesCount;
                    $event = event(new PostDisliked($post, $post->likes_count));
                    $action = 'dislike';

        }

        // Redirect back to the view or return a response as needed
        return $action;
    }

}
