<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $message;
    public $title;
    private $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message = null, $title = null, $type = null)
    {
        $this->message = $message;
        $this->title = $title;
        $this->type = $type;
    }

    public function backgroundCSS(){
        return [
            'error' => 'red',
            'success' => 'green',
            'warning' => 'yellow'
        ][$this->type];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
