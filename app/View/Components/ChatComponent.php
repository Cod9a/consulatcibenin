<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ChatComponent extends Component
{
    public $phoneNumber;
    public $opened;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($phoneNumber, $opened = false)
    {
        $this->phoneNumber = $phoneNumber;
        $this->opened = $opened;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.chat-component');
    }
}
