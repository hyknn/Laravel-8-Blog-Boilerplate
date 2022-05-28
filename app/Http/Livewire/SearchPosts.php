<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class SearchPosts extends Component
{
    public $search;
    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.search-posts',[
            'posts' => Post::where('title', 'like', '%'.$this->search.'%')->get(),
        ]);
    }
}
