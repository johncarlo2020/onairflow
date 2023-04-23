<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use App\Events\PostLiked;
use App\Events\PostDisliked;
use Illuminate\Support\Facades\Storage;
use App\Models\Comment;

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

            $comments = Comment::with('user') // Eager load the user relationship
            ->where('post_id', $post->id)
            ->get();
    
            foreach ($comments as $comment) {
            $userName = $comment->user->name; 
            }
            $post->comment=$comments;

            $currentUser = Auth::user(); 
            if ($currentUser) {
                $hasLiked = $post->likes()->where('user_id', $currentUser->id)->where('like',true)->exists();
                $post->has_liked = $hasLiked;
            }
            if ($currentUser) {
                $hasComment = Comment::where('user_id', $currentUser->id)->where('post_id', $post->id)->exists();
                $post->has_comment= $hasComment;
            }

            if (!empty($post->media)) {
                $mediaUrls = explode(',', $post->media);
                $post->media = $mediaUrls;
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
        $price = 0;

        // Create a new post
        $post = new Post();
        $post->user_id = auth()->id(); // Assuming the user is authenticated
        $post->content = $request->input('content');

        if($request->visibility == 'ppv'){
           $price = $request->price; 
        }
        $post->price = $price;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $post->thumbnail = $imageName;
        }
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('videos'), $videoName);
            $post->video = $videoName;
        }
        if ($request->hasFile('teaser')) {
            $video = $request->file('teaser');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('videos'), $videoName);
            $post->teaser = $videoName;
        }

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
