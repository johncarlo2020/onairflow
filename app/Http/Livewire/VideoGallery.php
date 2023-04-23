<?php

namespace App\Http\Livewire;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class VideoGallery extends Component
{
    public $testList = [];

    public function mount(){
        $posts = Post::where('user_id', auth()->id())
            ->whereNotNull('image')
            ->orWhereNotNull('video')
            ->orderBy('id', 'desc')
            ->get();




        $this->testList = $posts;
        // [
        //     (object)[
        //         'title' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
        //         'like' => 3,
        //         'view' => 20,
        //         'duration' => '00.24',
        //         'view_type' => 'paid_per_view',
        //         'card_type' => 'video',
        //         'price' => 24.00,
        //         'locked' => true
        //     ],
        //     (object)[
        //         'title' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
        //         'like' => 3,
        //         'view' => 20,
        //         'duration' => '00.24',
        //         'view_type' => 'paid_per_view',
        //         'card_type' => 'video',
        //         'price' => 24.00,
        //         'locked' => true
        //     ],
        //     (object)[
        //         'title' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
        //         'like' => 3,
        //         'view' => 20,
        //         'duration' => '00.24',
        //         'view_type' => 'paid_per_view',
        //         'card_type' => 'video',
        //         'price' => 24.00,
        //         'locked' => true
        //     ],
        //     (object)[
        //         'title' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
        //         'like' => 3,
        //         'view' => 20,
        //         'duration' => '00.24',
        //         'view_type' => 'paid_per_view',
        //         'card_type' => 'video',
        //         'price' => 24.00,
        //         'locked' => true
        //     ],
        //     (object)[
        //         'title' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
        //         'like' => 3,
        //         'view' => 20,
        //         'duration' => '00.24',
        //         'view_type' => 'paid_per_view',
        //         'card_type' => 'video',
        //         'price' => 24.00,
        //         'locked' => true
        //     ],
        //     (object)[
        //         'title' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
        //         'like' => 3,
        //         'view' => 20,
        //         'duration' => '00.24',
        //         'view_type' => 'paid_per_view',
        //         'card_type' => 'video',
        //         'price' => 24.00,
        //         'locked' => true
        //     ],
        // ];
    }

    public function render()
    {
        return view('livewire.video-gallery');
    }
}
