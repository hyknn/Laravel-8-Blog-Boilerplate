<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class SearchCategories extends Component
{
    public $search;
    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.search-categories',[
            'categories' => Category::where('name', 'like', '%'.$this->search.'%')->get(),
        ]);
    }
}
