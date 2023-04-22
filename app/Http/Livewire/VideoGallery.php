<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VideoGallery extends Component
{
    public $testList = [];

    public function mount(){
        $this->testList = [
            (object)[
                'title' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
                'like' => 3,
                'view' => 20,
                'duration' => '00.24',
                'view_type' => 'paid_per_view',
                'card_type' => 'video',
                'price' => 24.00,
                'locked' => true
            ],
            (object)[
                'title' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
                'like' => 3,
                'view' => 20,
                'duration' => '00.24',
                'view_type' => 'paid_per_view',
                'card_type' => 'video',
                'price' => 24.00,
                'locked' => true
            ],
            (object)[
                'title' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
                'like' => 3,
                'view' => 20,
                'duration' => '00.24',
                'view_type' => 'paid_per_view',
                'card_type' => 'video',
                'price' => 24.00,
                'locked' => true
            ],
            (object)[
                'title' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
                'like' => 3,
                'view' => 20,
                'duration' => '00.24',
                'view_type' => 'paid_per_view',
                'card_type' => 'video',
                'price' => 24.00,
                'locked' => true
            ],
            (object)[
                'title' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
                'like' => 3,
                'view' => 20,
                'duration' => '00.24',
                'view_type' => 'paid_per_view',
                'card_type' => 'video',
                'price' => 24.00,
                'locked' => true
            ],
            (object)[
                'title' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
                'like' => 3,
                'view' => 20,
                'duration' => '00.24',
                'view_type' => 'paid_per_view',
                'card_type' => 'video',
                'price' => 24.00,
                'locked' => true
            ],
        ];
    }

    public function render()
    {
        return view('livewire.video-gallery');
    }
}
