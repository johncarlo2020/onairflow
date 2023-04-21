<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Posts extends Component
{
    public $posts;
    public $posts2;

    public function render()
    {
        return view('livewire.posts',[
            'curentPost' => $this->posts,
        ]);
    }

   

}
