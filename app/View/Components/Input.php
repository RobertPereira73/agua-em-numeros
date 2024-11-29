<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $placeHolder,
        public string $name='',
        public string $type="text",
        public string $class='',
        public string $events='',
        public string $value=''
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
