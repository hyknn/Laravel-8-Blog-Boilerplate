<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class SearchPostsTrashed extends Component
{
    public $search;
    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.search-posts-trashed',[
            'posts' => Post::onlyTrashed()->where('title', 'like', '%'.$this->search.'%')->get(),
        ]);
    }
}
