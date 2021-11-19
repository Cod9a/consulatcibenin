<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PhoneInput extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $disabled;
    public $error;
    public $default;

    public function __construct($error = false, $default = null, $disabled = false)
    {
        $this->error = $error;
        $this->default = $default;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.phone-input');
    }
}
