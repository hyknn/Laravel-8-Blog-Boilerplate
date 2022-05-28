<?php

namespace App\Http\Livewire;
use Illuminate\Support\Str;

use Livewire\Component;

class PostPermalink extends Component
{
    public $permalink;

    public function render()
    {
        return view('livewire.post-permalink');
    }
}
