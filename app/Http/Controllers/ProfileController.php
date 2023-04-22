<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;



class ProfileController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id',auth()->id())->orderBy('id', 'desc')->get();
        $user=User::find(auth()->id());
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

        // $posts = [
        //     (object) [
        //         'title' => 'My First Blog Post',
        //         'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, lorem a feugiat tempus, ipsum enim vulputate quam, id fermentum velit velit vel purus. Nulla facilisi. Nulla consectetur, libero ut laoreet pellentesque, quam magna efficitur lorem, vel dictum ex urna in quam. Nam id dapibus sapien. Sed elementum libero quis metus mattis, eget dapibus urna imperdiet. Aliquam erat volutpat. Morbi sed volutpat odio, sit amet fringilla eros. In malesuada, quam a lacinia porttitor, turpis velit aliquet est, a molestie nisi lorem sit amet metus. Sed maximus nisl vitae erat hendrerit ullamcorper.',
        //         'author' => 'John Doe',
        //         'published_at' => '2022-04-20 10:00:00',
        //         'category' => 'Technology',
        //         'tags' => ['laravel', 'php', 'web development'],
        //         'likes' => 3
        //     ],
        //     (object) [
        //         'title' => 'My First Blog Post',
        //         'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, lorem a feugiat tempus, ipsum enim vulputate quam, id fermentum velit velit vel purus. Nulla facilisi. Nulla consectetur, libero ut laoreet pellentesque, quam magna efficitur lorem, vel dictum ex urna in quam. Nam id dapibus sapien. Sed elementum libero quis metus mattis, eget dapibus urna imperdiet. Aliquam erat volutpat. Morbi sed volutpat odio, sit amet fringilla eros. In malesuada, quam a lacinia porttitor, turpis velit aliquet est, a molestie nisi lorem sit amet metus. Sed maximus nisl vitae erat hendrerit ullamcorper.',
        //         'author' => 'John Doe',
        //         'published_at' => '2022-04-20 10:00:00',
        //         'category' => 'Technology',
        //         'tags' => ['laravel', 'php', 'web development'],
        //         'likes' => 3
        //     ],
        //     (object) [
        //         'title' => 'My First Blog Post',
        //         'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, lorem a feugiat tempus, ipsum enim vulputate quam, id fermentum velit velit vel purus. Nulla facilisi. Nulla consectetur, libero ut laoreet pellentesque, quam magna efficitur lorem, vel dictum ex urna in quam. Nam id dapibus sapien. Sed elementum libero quis metus mattis, eget dapibus urna imperdiet. Aliquam erat volutpat. Morbi sed volutpat odio, sit amet fringilla eros. In malesuada, quam a lacinia porttitor, turpis velit aliquet est, a molestie nisi lorem sit amet metus. Sed maximus nisl vitae erat hendrerit ullamcorper.',
        //         'author' => 'John Doe',
        //         'published_at' => '2022-04-20 10:00:00',
        //         'category' => 'Technology',
        //         'tags' => ['laravel', 'php', 'web development'],
        //         'likes' => 3
        //     ],
        //     (object) [
        //         'title' => 'My First Blog Post',
        //         'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, lorem a feugiat tempus, ipsum enim vulputate quam, id fermentum velit velit vel purus. Nulla facilisi. Nulla consectetur, libero ut laoreet pellentesque, quam magna efficitur lorem, vel dictum ex urna in quam. Nam id dapibus sapien. Sed elementum libero quis metus mattis, eget dapibus urna imperdiet. Aliquam erat volutpat. Morbi sed volutpat odio, sit amet fringilla eros. In malesuada, quam a lacinia porttitor, turpis velit aliquet est, a molestie nisi lorem sit amet metus. Sed maximus nisl vitae erat hendrerit ullamcorper.',
        //         'author' => 'John Doe',
        //         'published_at' => '2022-04-20 10:00:00',
        //         'category' => 'Technology',
        //         'tags' => ['laravel', 'php', 'web development'],
        //         'likes' => 0
        //     ],
        //     (object) [
        //         'title' => 'My First Blog Post',
        //         'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, lorem a feugiat tempus, ipsum enim vulputate quam, id fermentum velit velit vel purus. Nulla facilisi. Nulla consectetur, libero ut laoreet pellentesque, quam magna efficitur lorem, vel dictum ex urna in quam. Nam id dapibus sapien. Sed elementum libero quis metus mattis, eget dapibus urna imperdiet. Aliquam erat volutpat. Morbi sed volutpat odio, sit amet fringilla eros. In malesuada, quam a lacinia porttitor, turpis velit aliquet est, a molestie nisi lorem sit amet metus. Sed maximus nisl vitae erat hendrerit ullamcorper.',
        //         'author' => 'John Doe',
        //         'published_at' => '2022-04-20 10:00:00',
        //         'category' => 'Technology',
        //         'tags' => ['laravel', 'php', 'web development'],
        //         'likes' => 1
        //     ],
        //     (object) [
        //         'title' => 'My First Blog Post',
        //         'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, lorem a feugiat tempus, ipsum enim vulputate quam, id fermentum velit velit vel purus. Nulla facilisi. Nulla consectetur, libero ut laoreet pellentesque, quam magna efficitur lorem, vel dictum ex urna in quam. Nam id dapibus sapien. Sed elementum libero quis metus mattis, eget dapibus urna imperdiet. Aliquam erat volutpat. Morbi sed volutpat odio, sit amet fringilla eros. In malesuada, quam a lacinia porttitor, turpis velit aliquet est, a molestie nisi lorem sit amet metus. Sed maximus nisl vitae erat hendrerit ullamcorper.',
        //         'author' => 'John Doe',
        //         'published_at' => '2022-04-20 10:00:00',
        //         'category' => 'Technology',
        //         'tags' => ['laravel', 'php', 'web development'],
        //         'likes' => 3
        //     ],
        
        return view('profile.index',compact('posts','user'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
