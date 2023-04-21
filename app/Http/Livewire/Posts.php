<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Posts extends Component
{
    public $posts;

    public function render()
    {
        return view('livewire.posts');
    }

    public function mount($posts)
    {
        $this->posts = $posts;
    }

}
