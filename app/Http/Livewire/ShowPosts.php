<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowPosts extends Component
{
    public $postCount;
    public $recentlyAddedPost;
 
    protected $listeners = ['postAdded'=>'postAdded'];

    public function postAdded($count, $post)
    {
        $this->postCount = $count;
        $this->recentlyAddedPost = $post;
    }
    public function render()
    {
        return view('livewire.show-posts');
    }

    public function mount()
    {
        $this->postCount = 2;
        $this->recentlyAddedPost = "kimjingo";
    }
}