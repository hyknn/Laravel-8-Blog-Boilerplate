<?php

namespace App\Http\Livewire;
use Illuminate\Support\Str;

use Livewire\Component;

class Permalink extends Component
{
    public $permalink;

    public function render()
    {
        return view('livewire.permalink');
    }
}
